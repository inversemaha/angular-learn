<!DOCTYPE html>
<html lang="en">
<head>
    <title>Angular Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>


<div class="container" ng-app="myApp">
    <div class="row">

        <h5>Angular Js Example</h5>

    </div>
    <div class="row" ng-controller="myCtrl">

        {{-- <p>Hello <span ng-bind="name"></span></p>--}}

        <div class="col-md-5 mx-auto">
            <form action="/">

                <div class="form-group mt-4">
                    <label>District</label>
                    <select ng-model="district" ng-change="districtChange()" class="form-control">
                        <option value="">Select One</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Rajshahi</option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <label>Upazila</label>
                    <select ng-model="upazila" class="form-control">
                        <option value="">Select Upazila</option>

                        <option value="@{{ upazila.id }}" ng-repeat="upazila in upazila_list">@{{ upazila.name }}
                        </option>

                    </select>
                </div>

                <div class="" id="personal_info" ng-show="personal_info">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" ng-model="name"
                               ng-change="nameChange()">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" ng-model="phone"
                               ng-change="phoneChange()">
                        <p class="error text-danger" ng-bind="error"></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" ng-model="email">
                    </div>
                </div>


                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-small" ng-click="save()">Save</button>
                </div>
            </form>
        </div>

    </div>


    {{-- <div class="row" ng-controller="myCtrl2"></div>--}}
</div>


<script>
    var app = angular.module('myApp', []);


    app.controller('myCtrl', function ($scope, $http) {

        $scope.name = '';
        $scope.district = "";

        $scope.upazila_list = [];

        $scope.personal_info = true;
        $scope.save = function () {
            console.log($scope.name);
            console.log($scope.email);
        }
        $scope.nameChange = function () {
            console.log($scope.name);
        }
        $scope.districtChange = function () {


            //document.getElementById("personal_info").style.display = "none";
            $scope.personal_info = false;
            console.log($scope.district);


            $http.get("/upazila/" + $scope.district)

                .then(function (response) {
                    /* console.log(response.config);
                     console.log(response.data);
                     console.log(response.headers);
                     console.log(response.status);
                     console.log(response.statusText);*/

                    console.log(response.data.upazila);
                    $scope.upazila_list = response.data.upazila;
                }, function (response) {

                    console.log("error");
                });


            // $scope.upazila_list=;
        }

        $scope.phoneChange = function () {

            console.log($scope.phone.length);
            if ($scope.phone.length < 11) {
                $scope.error = "Not a valid Phone NUmber";

            } else {
                $scope.error = "valid Phone NUmber";

            }

        }


    });
</script>


</body>
</html>
