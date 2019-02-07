angular.module('starter').service('layout_taxi', function ($rootScope, HomepageLayout) {

    let service = {
        cabride: null
    };

    /**
     * Must return a valid template
     *
     * @returns {string}
     */
    service.getTemplate = function () {
        return 'modules/layout/home/layout_taxi/view.html';
    };

    /**
     * Must return a valid template
     *
     * @returns {string}
     */
    service.getModalTemplate = function () {
        /*return "templates/home/l10/modal.html";*/
    };

    /**
     * onResize is used for css/js callbacks when orientation change
     */
    service.onResize = function () {
        /** Do nothing for this particular one */
    };

    /**
     * Manipulate the features objects
     *
     * Examples:
     * - you can re-order features
     * - you can push/place the "more_button"
     *
     * @param features
     * @param moreButton
     * @returns {*}
     */
    service.features = function (features, moreButton) {
        /**
         * Checking for TaxiRide module!
         */

        service.cabride = _.find(features.options, function (option) {
            return option.code === "cabride";
        });

        service.cabride.is_visible = false;

        // We do exclude cabride from all the features we will handle them manually!
        _.remove(features.options, function (option) {
            return option.code === "cabride";
        });

        features.options.forEach(function (option) {
            option.is_visible = true;
        });

        features.options.unshift(service.cabride);

        return features;
    };

    return service;

});

// Custom controller
angular.module('starter').controller('LayoutTaxiController', function ($scope, $rootScope, $state,
                                                                       $ionicSideMenuDelegate,
                                                                       $ionicHistory, Customer,
                                                                       SB, layout_taxi) {

    angular.extend($scope, {
        isOnline: false,
        customer: null,
        isLoggedIn: Customer.isLoggedIn(),
        isPassenger: false,
        isDriver: false,
        cabride: layout_taxi.cabride
    });

    /**
     * @param identifier
     */
    $scope.loadPage = function (identifier) {
        if ($ionicSideMenuDelegate.isOpenLeft()) {
            $ionicSideMenuDelegate.toggleLeft();
        }
        if ($ionicSideMenuDelegate.isOpenRight()) {
            $ionicSideMenuDelegate.toggleRight();
        }
        $ionicHistory.nextViewOptions({
            historyRoot: true,
            disableAnimate: false
        });
        switch (identifier) {
            case "cabride-home":
                $state.go("cabride-home");
                break;
            case "pending-requests":
                $state.go("cabride-pending-requests");
                break;
            case "accepted-requests":
                $state.go("cabride-accepted-requests");
                break;
            case "completed-rides":
                $state.go("cabride-completed-rides");
                break;
            case "cancelled":
                $state.go("cabride-cancelled");
                break;
            case "vehicle-information":
                $state.go("cabride-vehicle-information");
                break;
            case "payment-history":
                $state.go("cabride-payment-history");
                break;
        }
    };

    $scope.toggleStatus = function () {
        $scope.isOnline = !$scope.isOnline;

        // Broadcasting online/offline status
        $rootScope.$broadcast("cabride.isOnline", $scope.isOnline);
    };

    $scope.loginOrSignup = function () {
        Customer.loginModal($scope);
    };

    $scope.customerName = function () {
        if ($scope.customer &&
            $scope.customer.firstname &&
            $scope.customer.lastname) {
            var fname = $scope.customer.firstname.toLowerCase();
            fname = fname.charAt(0).toUpperCase() + fname.slice(1);
            var lname = $scope.customer.lastname.toUpperCase();

            return fname + ' ' + lname
        }
        return '';
    };

    // On load!
    Customer.find()
        .then(function(customer) {
            $scope.customer = customer;
            $scope.customer.metadatas = _.isObject($scope.customer.metadatas)
                ? $scope.customer.metadatas
                : {};
            $scope.avatarUrl = Customer.getAvatarUrl($scope.customer.id);

            return customer;
        });

    // Answer for a call form the cabride controller!
    $rootScope.$on("cabride.isTaxiLayoutActive", function () {
        console.log("// Answer for a call form the cabride controller!");
        $rootScope.$broadcast("cabride.isTaxiLayout");
    });

    /**
     * Hooks
     */
    $scope.rebuildMenu = function () {
        $scope.isLoggedIn = Customer.isLoggedIn();
        if ($scope.isLoggedIn) {
            Customer
                .find()
                .then(function(customer) {
                    $scope.customer = customer;
                    $scope.customer.metadatas = _.isObject($scope.customer.metadatas)
                        ? $scope.customer.metadatas
                        : {};
                    $scope.avatarUrl = Customer.getAvatarUrl($scope.customer.id);

                    return customer;
                });
        } else {
            $scope.customer = null;
        }
    };

    $rootScope.$on(SB.EVENTS.AUTH.logoutSuccess, function () {
        $scope.rebuildMenu();
    });

    $rootScope.$on(SB.EVENTS.AUTH.loginSuccess, function () {
        $scope.rebuildMenu();
    });

    $rootScope.$on(SB.EVENTS.AUTH.registerSuccess, function () {
        $scope.rebuildMenu();
    });

    $rootScope.$on(SB.EVENTS.AUTH.editSuccess, function () {
        $scope.rebuildMenu();
    });

    $rootScope.$on("cabride.setIsOnline", function (event, isOnline) {
        $scope.isOnline = isOnline;
    });

    $rootScope.$on("cabride.isPassenger", function () {
        $scope.isPassenger = true;
        $scope.isDriver = false;
        $scope.rebuildMenu();
    });

    $rootScope.$on("cabride.isDriver", function () {
        $scope.isPassenger = false;
        $scope.isDriver = true;
        $scope.rebuildMenu();
    });
});

