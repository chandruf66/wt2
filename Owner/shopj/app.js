var angularCart = angular.module("angularCart", ["ngRoute", "ngAnimate"]);

angularCart.config(function($routeProvider){
    $routeProvider
        .when("/products",{
            templateUrl: "partial/products.html",
            controller: "allProduct"
        }) 
        .when("/cart",{
            templateUrl: "partial/cart.html",
            controller: "cartProduct"
        }) 
        .otherwise({
            redirectTo: "/products"
        });
});

angularCart.controller("headerController",function($scope,$location){
    $scope.apptitle = {
        title : "Angular Cart"
    }
    $scope.nav = {};
	$scope.nav.isActive = function(path) {
		if (path === $location.path()) {
			return true;
		}
		
		return false;
	}
}); 

angularCart.factory("cartService", function() {
	var cart = [];
	
	return {
		getCart: function() {
			return cart;
		},
		addToCart: function(product) {
			cart.push(product);
            alert(product.name + ' Is Added To The Cart');
		},
		buyNow: function(product) {
			alert("Thanks for buying: " + product.name);
		}
	}
});
angularCart.factory("productService", function() {
	var products = [
        {
            id: 1,
            img: '/img/sony.jpg',
            name: ' sony camera',
            desc: 'camera is the category and arrived yesterday.',
            price: 10000,
            color: 'Black',
            size: '10 cm',
            status: 'In-Stock'
        },
        {
            id: 2,
            img: '/img/pcb.jpg',
            name: 'pcb',
            desc: 'accessories in category and arrived today.',
            price: 1000,
            color: 'Blue',
            size: '8 cm',
            status: 'In-Stock'
        },
        {
            id: 3,
            img: '/img1/harddisk.jpg',
            name: 'hard disk',
            desc: 'accessories in category and arrivied two days before.',
            price: 1200,
            color: 'white',
            size: '6 cm',
            status: 'In-Stock'
        },
        {
            id: 4,
            img: '/img1/hdd.jpg',
            name: 'hard disk',
            desc: 'accessories in category and arrivied two days before..',
            price: 1400,
            color: 'black',
            size: '5 cm',
            status: 'In-Stock'
        },
        {
            id: 5,
            img: '/img1/hp.jpg',
            name: 'laptop',
            desc: 'laptop in category and arrivied today.',
            price: 57000,
            color: 'black',
            size: '15 inch',
            status: 'In-Stock'
        },
        {
            id: 6,
            img: '/img1/one+.jpg',
            name: 'one Plus mobile',
            desc: 'mobile in category.',
            price: 30000,
            color: 'light blue',
            size: '10 cm',
            status: 'In-Stock'
        },
        {
            id: 7,
            img: '/img1/samsung.jpeg',
            name: 'samsung mobile',
            desc: 'mobile in category.',
            price: 27000,
            color: 'white',
            size: '10 cm',
            status: 'In-Stock'
        },
        {
            id: 8,
            img: '/img1/usb.jpeg',
            name: 'usb',
            desc: 'accessories in category.',
            price: 500,
            color: 'white',
            size: '10 cm',
            status: 'In-Stock'
        },
        {
            id: 9,
            img: '/img1/hdd.jpg',
            name: 'hard disk',
            desc: 'accessories in category and arrivied two days before..',
            price: 1400,
            color: 'black',
            size: '5 cm',
            status: 'In-Stock'
        }
    ];
	
	return {
		getproducts: function() {
			return products;
		},
		addToCart: function(product) {
			cart.push(product);
		}
	}
});


angularCart.controller("cartProduct", function($scope, cartService) {
	$scope.cart = cartService.getCart();
	
	$scope.buyNow = function(product) { 
		cartService.buyNow(product);
	}
});
 

angularCart.controller("allProduct", function($scope, productService, cartService) {
	$scope.products = productService.getproducts();
	
	$scope.addToCart = function(product) {
		cartService.addToCart(product);
	}
});
