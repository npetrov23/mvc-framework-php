Vue.component('product', {
    data: function() {
        return {
            id: 0,
            title: "",
            description: "",
            price: 0,
        }
    },
    props: ['product_id'],
    created: function() { 
        fetch('/catalog/rest/product/get/' + this.product_id)
            .then(response => response.json())
            .then(model => {
                this.title = model["title"],
                this.description = model["description"],
                this.price = model["price"],
                this.id = model["id"]
            })
    },
    template: `<div><p>id: {{id}}</p>
    <p>Название: {{title}}</p>
    <p>Описание: {{description}}</p>
    <p>Цена: {{price}}р</p></div>`
})

let app = new Vue({
    el: "#info"
})




