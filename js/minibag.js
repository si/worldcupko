
// Class to represent a product
function Product(description, image, colour, size, price, quantity) {

    var self = this;
    self.image = image;
    self.description = description;
    self.colour = colour;
    self.size = size;
    self.price = price;
    self.quantity = ko.observable(quantity);

    // Combine colour and size as detail
    self.detail = ko.computed(function() {
        var colour = self.colour,
            size = self.size;
        return (colour ? colour : "No colour") + "/" + (size ? size : "No size");
    });

    // Format price based on cost and quantity
    self.formattedPrice = ko.computed(function() {
        var price = self.price,
            quantity = self.quantity;
        return price ? "£" + price.toFixed(2) : "Free";
    });
    
    // Build path for product image
    self.imagePath = ko.computed(function() {
      return (self.image!='') ? '/img/products/' + self.image : 'http://www.placecage.com/100/100';
    });

}

// Overall viewmodel for this screen, along with initial state
function MinibagViewModel() {

    var self = this;
    

    self.items = ko.observableArray(['Dress','Shirt','Skirt','Trousers', 'Shoes', 'Boots']);
    self.sizes = ko.observableArray(['UK 8','UK 10','UK 12','UK 14', 'UK 16']);
    self.colours = ko.observableArray(['Black','Grey','Pink','Blue', 'Green','White','Yellow']);
    self.validCodes = ko.observableArray([
      'AA11AAA',
      'BB22BBB',
      'CC33CCC',
      'DD44DDD',
      'EE55EEE'
    ]);

    // Editable data
    self.products = ko.observableArray([
        new Product("ASOS mini skirt with peplum frill hem","skirt.jpg","Pink","UK 8", 35, 1),
        new Product("Camden chunky lace up black heeled boot","boot.jpg","Black","UK 6", 60, 1)
    ]);
    
    self.totalPrice = ko.computed(function() {
       var total = 0;
       for (var i = 0; i < self.products().length; i++)
           total += self.products()[i].price;
       return total.toFixed(2);
    });

    self.totalTax = ko.computed(function() {
       var total = self.totalPrice(),
            tax = 0;
       tax = total * 0.2;
       return tax.toFixed(2);
    });

    self.discount = ko.observable(0);
    
    self.deliveryCost = ko.computed(function() {
      return 0;
    });

    // Operations
    self.addProduct = function() {
      var item = self.items()[ (Math.floor( Math.random() * (self.items()).length )) ],
          size = self.sizes()[ (Math.floor( Math.random() * (self.sizes()).length )) ],
          colour = self.colours()[ Math.floor( Math.random() * (self.colours()).length ) ];
      self.products.push(new Product(item,'',colour,size,1 + Math.random()*100, 1));
    }
    self.removeProduct = function(product) { 
      self.products.remove(product) 
    }
    
    self.applyDiscount = function() {
      var promoCode = document.querySelectorAll('input[name=PromoCode]');
//      if ( self.validCodes().indexOf(promoCode[0].value) !== false ) {
        self.discount() += 10;
//      }
    }


}

JSON = {
  "Bag" : [
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
    {
      "Description" : "Default Description",
      "Option" : "No Colour",
      "Size" : "No Size",
      "Quantity" : 1,
      "Price" : 0,
      "ImageUrl" : "http://images.asos-media.com//inv/media/1/8/1/5/3055181/grey/image1l.jpg"
    },
  ]
};

var myMBM = new MinibagViewModel();
ko.applyBindings(myMBM, document.getElementById('MiniBag'));



