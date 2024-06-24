const express = require("express");
const path = require("path");
const fs = require("fs");
const app = express();
const port = 3001;

app.use(express.json());

const dbFilePath = path.join(__dirname, "data", "db.json");

const readDB = () => {
  const data = fs.readFileSync(dbFilePath, "utf-8");
  return JSON.parse(data);
};

const writeDB = (data) => {
  fs.writeFileSync(dbFilePath, JSON.stringify(data, null, 2), "utf-8");
};

app.get("/api/products", (req, res) => {
  const products = readDB();
  res.json(products);
});

app.post("/api/products", (req, res) => {
  const products = readDB();
  const newProduct = { id: Date.now(), ...req.body };
  products.push(newProduct);
  writeDB(products);
  res.status(201).json(newProduct);
});

app.put("/api/products/:id", (req, res) => {
  const products = readDB();
  const productIndex = products.findIndex(
    (p) => p.id === parseInt(req.params.id)
  );
  if (productIndex !== -1) {
    products[productIndex] = { ...products[productIndex], ...req.body };
    writeDB(products);
    res.json(products[productIndex]);
  } else {
    res.status(404).send("Product not found");
  }
});

app.delete("/api/products/:id", (req, res) => {
  let products = readDB();
  products = products.filter((p) => p.id !== parseInt(req.params.id));
  writeDB(products);
  res.status(204).send();
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
