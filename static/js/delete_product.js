$('.catalog__delete-product').on('click', function(e) {
    let current_product = e.target.closest(".catalog__product");
    console.log($(this).attr('id'));
    $.get('/catalog/rest/product/delete/' + $(this).attr('id'), function(data) {
          current_product.remove();
          alert('Товар успешно удален!');
        });
  });