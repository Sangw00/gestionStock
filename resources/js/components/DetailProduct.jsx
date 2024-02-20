import { useEffect, useState } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom'; // Import useParams hook

function DetailProduct(){

    const [product, setProduct] = useState([]);
    const { id } = useParams(); // Use useParams hook to get the id from the URL

    useEffect(() => {
      fetchProducts();
    }, []);

    function fetchProducts() {
      axios.get(`http://127.0.0.1:8000/api/products/${id}/show`)
        .then(response => {
          setProduct(response.data.product);
        })
        .catch(error => {
          console.error("Error fetching products:", error);
        });
    }

    return(
      <div>
        <h1>{product.id}</h1>
      </div>
    );
}

export default DetailProduct;
