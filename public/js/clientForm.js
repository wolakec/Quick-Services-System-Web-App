(function() {
    var app = angular.module('myApp', ['ui.bootstrap']);
    app.controller('FormController', ['$scope', function($scope) {

            $scope.stepp = 1;

            $scope.nextStep = function() {
                $scope.stepp++;
            }

            $scope.prevStep = function() {
                $scope.stepp--;
            }

            $scope.submitForm = function() {

            }
        }]);

    app.controller('OptionsController', function($scope) {

    });
    
    app.controller('ProductFormController',['$scope', function($scope){
      
        $scope.packages = [{}];
        
        $scope.addPackage = function(){
            $scope.packages.push({})
        }
    }]);

    app.controller('dropdownCTRL', function($scope, $http) {
        $http.get("/product/listAllJson").success(function(response) {
            $scope.products = response;
        });

        $scope.getpackage = function(item,product) {
            console.log("id selected:" + item);
            $http.get("/product/" + item + "/packages").success(function(response) {
                product.options = response;
            });
            console.log("product/" + item + "/packages");
        }

        $scope.Fullproducts = [{'packages':[{}],'options':[{}]}];
        
        $scope.addProduct = function() {
            $scope.Fullproducts.push({'packages':[{}],'options':[{}]});
        }


        $scope.Fullpackages = [[]];
        
        $scope.addPackage = function(product) {
            product.packages.push({});          
        }

 });
   
})();

//This will add new package and product in the stock form

//var app = angular.module('MyApp',[]);




//Hide And Show in The promotion form
$(document).ready(function() {
        $("#ListOfClients").hide();
        $("#ListOfSalesMen").hide();
        $("#AmountDiscount").hide();
        $("#AdvancedOptions").hide();
    
    
    
     $("#AdvacedOptionsBTN").click(function() {
        $("#AdvancedOptions").toggle();
    });
    
    $("#CheckALL").click(function() {
        $("#AllClients").toggle();
        $("#AllSalesmen").toggle();
    });
    
    
     $("#IfDiscount").click(function() {
        $("#AmountDiscount").toggle();
    });

    $("#ChooseSalesman").click(function() {
        $("#ListOfSalesMen").toggle();
        if ($("#ListOfSalesMen").css('display') === 'none') {
        //alert("Surprise Motherfucker");
    } else {

            $.getJSON("/mac/all",function(data) {
                
                $("#ListOfSalesMen option").remove(); // Remove all <option> child tags.
                $.each(data, function(data) {
                    //console.log(this.name)
                   $('#ListOfSalesMen').append($("<option/>", {
                        value: this.id,
                        text: this.name
                   }));
                });
            });
        



    }//end of the IF
        
        
    });


    $("#ChooseClient").click(function() {
        $("#ListOfClients").toggle();
        
    if ($("#ListOfClients").css('display') === 'none') {
        //alert("Surprise Motherfucker");
    } else {

                //$("#ListOfClients option").remove(); // Remove all <option> child tags.
                $.getJSON("/view/all",function(data) {
                
                $("#ListOfClients option").remove(); // Remove all <option> child tags.
                $.each(data, function(data) {
                    //console.log(this.name)
                   $('#ListOfClients').append($("<option/>", {
                        value: this.id,
                        text: this.name
                   }));
                });
            });
    }//end of the IF
    });//end of the function


}); 
