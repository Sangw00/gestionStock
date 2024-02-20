import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';
import axios from "axios";
import DetailProduct from "./DetailProduct"
import { BrowserRouter as Router , Routes, Route} from 'react-router-dom';

function AllProducts() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetchProducts();
  }, []);

  function fetchProducts() {
    axios.get("http://127.0.0.1:8000/api/products")
      .then(response => {
        setProducts(response.data.products);
      })
      .catch(error => {
        console.error("Error fetching products:", error);
      });
  }

  console.log("Products:", products);

  return (
    <div className="container">
      <p>All products</p>
      <table className="table table-hover">
        <thead>
          <tr>
            <th>id</th>
            <th>category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {products.length > 0 ? (
            products.map(product => (
              <tr key={product.id}>
                <td>{product.id}</td>
                <td>{product.category}</td>
                <td>{product.name}</td>
                <td>{product.description}</td>
                <td>
                  <a href="*" className="btn btn-outline-secondary">
                    <span className="material-symbols-outlined">edit</span>
                  </a>
                </td>
                <td>
                  <button type="submit" className="btn btn-outline-primary">
                    <a href="*">
                      <span className="material-symbols-outlined">delete</span>
                    </a>
                  </button>
                </td>
                <td>
                  <a href={`/products/${product.id}/show`} className="btn btn-outline-secondary">
                    <span className="material-symbols-outlined">view</span>
                  </a>
                </td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan="4">No products available</td>
            </tr>
          )}
        </tbody>
      </table>
      <Router>
      <Routes>
        <Route path="/products" component={<AllProducts id={product.id}/>} />
        <Route path="/products/:id/show" component={<DetailProduct/>} />
      
      </Routes>
    </Router>
    </div>
  );
}

export default AllProducts;

if (document.getElementById('example')) {
  const Index = ReactDOM.createRoot(document.getElementById('example'));

  Index.render(
    <React.StrictMode>
      <DetailProduct />
    </React.StrictMode>
  );
}
