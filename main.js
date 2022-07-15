
function excluirProduto(id) {


    const data = { product_id: id };

    fetch("connection/db_view.php?product_id="+id, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        }
    }).then((response) => response.json()).then((data) => {
            document.location.reload(true);
            console.log("Success:", data);
        }).catch((error) => {
            console.error("Error:", error);
        });
}
