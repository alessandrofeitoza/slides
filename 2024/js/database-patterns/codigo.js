const {database} = './connection';

class Product {
    constructor(name) {
        this.name = name;
    }

    save () {
         database.execute(`
            INSERT INTO tb_estoque(name) 
            VALUES ('${this.name}')
        `);
    }
}

let bebida =  new Product('Heineken');
bebida.save();