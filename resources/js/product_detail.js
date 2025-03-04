function changeImage(event, src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
    event.target.classList.add('active');
}

document.addEventListener("DOMContentLoaded", function() {
    const infoList = document.querySelector("#product-info");
    const items = infoList.querySelectorAll(".introduce__list--item");
    const button = document.querySelector("#toggle-info");

    button.addEventListener("click", function() {
        items.forEach((item, index) => {
            if (index >= 5) {
                item.style.display = item.style.display === "list-item" ? "none" : "list-item";
            }
        });
        button.textContent = button.textContent === "Hiển thị thêm" ? "Thu gọn" : "Hiển thị thêm";
    });
});
