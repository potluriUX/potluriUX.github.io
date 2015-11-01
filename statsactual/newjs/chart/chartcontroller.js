
StatsControllers.controller("ChartController", ['$scope', '$routeParams','$http', '$location', 'post_to_chart_properties', 'sharedProperties',
    'usageSummary',
    function($scope,$routeParams, $http, $location, post_to_chart_properties, sharedProperties, usageSummary) {//added new{
         if($routeParams.graph_data_passed_in_url){
             var x = JSON.parse(decodeURIComponent($routeParams.graph_data_passed_in_url));
//               console.log( encodeURIComponent(JSON.stringify({0:$scope.documents_total_y_axis, 1:$scope.sessions_total_y_axis, 
//                      2:$scope.searches_total_y_axis,3:month_dates_x_axis_actual_on_graph, 4:color })));
              var color = x[4];
              $scope.documents_total_y_axis = x[0];
              $scope.sessions_total_y_axis = x[1];
              $scope.searches_total_y_axis = x[2];
              var month_dates_x_axis_actual_on_graph = x[3];
              
              Highcharts.setOptions({
            lang: {
                decimalPoint: '.',
                thousandsSep: ','
            }
        });
        $scope.chartConfig = post_to_chart_properties.set_chart_config($scope, month_dates_x_axis_actual_on_graph, color);
        }
        else{
            //post_to_chart_properties.setTitle('graph');
            $scope.title = post_to_chart_properties.getTitle();
            console.log( $scope.title);
        $scope.count = 0;
        $scope.tab = 1;//by default the tab that will be selected. total usage tab is selected.

        var num_of_months_to_show = 15;//15 months data to be shown in the graph

        var prev_next_months_count = 6;//6 months prev or next pagination constant.

        var color = ['#56d76a', '#3c97ef', '#fb3f26'];

        var posted_data = post_to_chart_properties.getProperty();
       // $scope.title = post_to_chart_properties.getTitle();
        $scope.backenddata = sharedProperties.getProperty();

        var key = '';
        var i = 0;

        var month_dates_x_axis = [];
        var month_dates_x_axis_actual_on_graph = [];
        var dates = Object.keys($scope.backenddata.result.usagedates);

        $scope.calculate_months_xaxis = function() {
            for (i = dates.indexOf(posted_data.year); i > dates.indexOf(posted_data.year) - num_of_months_to_show; i--) {
                if (dates[i]) {

                    month_dates_x_axis.push(dates[i]);
                    month_dates_x_axis_actual_on_graph.push($scope.backenddata.result.usagedates[dates[i]]);

                }


            }
            month_dates_x_axis.reverse();//reverse the array for dates earlier to later @potluri
            month_dates_x_axis_actual_on_graph.reverse();//reverse the array for dates earlier to later @potluri
        }

        $scope.calculate_months_xaxis2 = function(posted_data) {

            month_dates_x_axis.reverse();//reverse the array for dates earlier to later @potluri
            month_dates_x_axis_actual_on_graph.reverse();
            for (i = dates.indexOf(posted_data.year); i > dates.indexOf(posted_data.year) - prev_next_months_count; i--) {
                if (dates[i]) {

                    month_dates_x_axis.push(dates[i]);
                    month_dates_x_axis_actual_on_graph.push($scope.backenddata.result.usagedates[dates[i]]);

                }


            }
            //    console.log(month_dates_x_axis_actual_on_graph);
            month_dates_x_axis.reverse();//reverse the array for dates earlier to later @potluri
            month_dates_x_axis_actual_on_graph.reverse();//reverse the array for dates earlier to later @potluri
            month_dates_x_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            month_dates_x_axis_actual_on_graph.splice(num_of_months_to_show, Number.MAX_VALUE);

        }
        $scope.calculate_months_xaxis();//calling the above function*********


        $scope.calculate_months_xaxis3 = function(posted_data, enddate) {

//        month_dates_x_axis.reverse();//reverse the array for dates earlier to later @potluri
//            month_dates_x_axis_actual_on_graph.reverse();
            for (i = dates.indexOf(posted_data.year) + 1; i <= dates.indexOf(posted_data.year) + prev_next_months_count; i++) {
                if (dates[i]) {

                    month_dates_x_axis.push(dates[i]);
                    month_dates_x_axis_actual_on_graph.push($scope.backenddata.result.usagedates[dates[i]]);

                }


            }
            //    console.log(month_dates_x_axis_actual_on_graph);
//            month_dates_x_axis.reverse();//reverse the array for dates earlier to later @potluri
//            month_dates_x_axis_actual_on_graph.reverse();//reverse the array for dates earlier to later @potluri
//            month_dates_x_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
//            month_dates_x_axis_actual_on_graph.splice(num_of_months_to_show, Number.MAX_VALUE);

            for (i = 0; i < prev_next_months_count; i++) {
                month_dates_x_axis.shift();
                month_dates_x_axis_actual_on_graph.shift();
            }
        }
        if (posted_data.radioincludesites == 'yes') {
            var customers = Object.keys($scope.backenddata.result.children)
        } else {
            var customers = [$scope.backenddata.result.customerid];
        }


        $scope.calculate_remote_onsite_ind_total3 = function() {
            $scope.usageinfo = sharedProperties.get_usageinfo_property2();
//                    $scope.documents_onsite_y_axis.reverse();
//                    $scope.searches_onsite_y_axis.reverse();
//                    $scope.sessions_onsite_y_axis.reverse();
//
//
//                    $scope.documents_remote_y_axis.reverse();
//                    $scope.searches_remote_y_axis.reverse();
//                    $scope.sessions_remote_y_axis.reverse();
//
//
//                    $scope.documents_individual_y_axis.reverse();
//                    $scope.searches_individual_y_axis.reverse();
//                    $scope.sessions_individual_y_axis.reverse();
//
//                    $scope.documents_total_y_axis.reverse();
//                    $scope.searches_total_y_axis.reverse();
//                    $scope.sessions_total_y_axis.reverse();

            $scope.month_dates_x_axis = month_dates_x_axis_actual_on_graph;
            var lengthofmonthsarray = month_dates_x_axis.length;
            //  console.log(month_dates_x_axis);
            for (var i = month_dates_x_axis.length - (month_dates_x_axis.length - (num_of_months_to_show - prev_next_months_count)); i < month_dates_x_axis.length; i++) {
                //if 12 in month then start at 12-3 12-(12-(15-6)) not 12-6 if 13 then 13-(13-(15-6))
                // not 13-6 if 14 then 14-5 if 10 then   ... 15-(15-(15-6))
                // console.log(month_dates_x_axis);
                //building documents sessions searches y axis arrays. 
                //  console.log(month_dates_x_axis[i]);
                //  console.log(month_dates_x_axis[i]);
                //    console.log($scope.usageinfo.result[month_dates_x_axis[i]]);
                //   console.log($scope.documents_total_y_axis);
                if ($scope.usageinfo.result[month_dates_x_axis[i]]) {
                    //   console.log( $scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents);
                    $scope.documents_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents);
                    $scope.searches_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.searches);
                    $scope.sessions_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.sessions);


                    $scope.documents_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.documents);
                    $scope.searches_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.searches);
                    $scope.sessions_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.sessions);


                    $scope.documents_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.documents);
                    $scope.searches_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.searches);
                    $scope.sessions_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.sessions);

                    $scope.documents_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents
                            + $scope.usageinfo.result[month_dates_x_axis[i]].remote.documents +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.documents);
                    $scope.searches_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.searches +
                            $scope.usageinfo.result[month_dates_x_axis[i]].remote.searches +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.searches);
                    $scope.sessions_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.sessions +
                            $scope.usageinfo.result[month_dates_x_axis[i]].remote.sessions +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.sessions);
                }
                else {
                    var a = 'na';//no data for the month so some random data to show no data.
                    $scope.documents_onsite_y_axis.push(a);
                    $scope.searches_onsite_y_axis.push(a);
                    $scope.sessions_onsite_y_axis.push(a);


                    $scope.documents_remote_y_axis.push(a);
                    $scope.searches_remote_y_axis.push(a);
                    $scope.sessions_remote_y_axis.push(a);


                    $scope.documents_individual_y_axis.push(a);
                    $scope.searches_individual_y_axis.push(a);
                    $scope.sessions_individual_y_axis.push(a);

                    $scope.documents_total_y_axis.push(a);
                    $scope.searches_total_y_axis.push(a);
                    $scope.sessions_total_y_axis.push(a);
                }
                // console.log($scope.productinfo);
            }
















            for (i = 0; i < prev_next_months_count; i++) {
                $scope.documents_onsite_y_axis.shift();
                $scope.searches_onsite_y_axis.shift();
                $scope.sessions_onsite_y_axis.shift();


                $scope.documents_remote_y_axis.shift();
                $scope.searches_remote_y_axis.shift();
                $scope.sessions_remote_y_axis.shift();


                $scope.documents_individual_y_axis.shift();
                $scope.searches_individual_y_axis.shift();
                $scope.sessions_individual_y_axis.shift();

                $scope.documents_total_y_axis.shift();
                $scope.searches_total_y_axis.shift();
                $scope.sessions_total_y_axis.shift();
            }





        }


//cuid, startDate, endDate, product[], customer[]
        $scope.calculate_remote_onsite_ind_total2 = function() {
            $scope.usageinfo = sharedProperties.get_usageinfo_property2();
            $scope.documents_onsite_y_axis.reverse();
            $scope.searches_onsite_y_axis.reverse();
            $scope.sessions_onsite_y_axis.reverse();


            $scope.documents_remote_y_axis.reverse();
            $scope.searches_remote_y_axis.reverse();
            $scope.sessions_remote_y_axis.reverse();


            $scope.documents_individual_y_axis.reverse();
            $scope.searches_individual_y_axis.reverse();
            $scope.sessions_individual_y_axis.reverse();

            $scope.documents_total_y_axis.reverse();
            $scope.searches_total_y_axis.reverse();
            $scope.sessions_total_y_axis.reverse();

            $scope.month_dates_x_axis = month_dates_x_axis_actual_on_graph;
            var lengthofmonthsarray = month_dates_x_axis.length;
            for (var i = 5; i >= 0; i--) {
                //console.log(month_dates_x_axis[i]);
                //building documents sessions searches y axis arrays. 
//                  console.log(month_dates_x_axis[i]);
//                 console.log( $scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents);
                if ($scope.usageinfo.result[month_dates_x_axis[i]]) {

                    $scope.documents_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents);
                    $scope.searches_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.searches);
                    $scope.sessions_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.sessions);


                    $scope.documents_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.documents);
                    $scope.searches_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.searches);
                    $scope.sessions_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.sessions);


                    $scope.documents_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.documents);
                    $scope.searches_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.searches);
                    $scope.sessions_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.sessions);

                    $scope.documents_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents
                            + $scope.usageinfo.result[month_dates_x_axis[i]].remote.documents +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.documents);
                    $scope.searches_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.searches +
                            $scope.usageinfo.result[month_dates_x_axis[i]].remote.searches +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.searches);
                    $scope.sessions_total_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.sessions +
                            $scope.usageinfo.result[month_dates_x_axis[i]].remote.sessions +
                            $scope.usageinfo.result[month_dates_x_axis[i]].individual.sessions);
                } else {
                    var a = 'na';//no data for the month so some random data to show no data.
                    $scope.documents_onsite_y_axis.push(a);
                    $scope.searches_onsite_y_axis.push(a);
                    $scope.sessions_onsite_y_axis.push(a);


                    $scope.documents_remote_y_axis.push(a);
                    $scope.searches_remote_y_axis.push(a);
                    $scope.sessions_remote_y_axis.push(a);


                    $scope.documents_individual_y_axis.push(a);
                    $scope.searches_individual_y_axis.push(a);
                    $scope.sessions_individual_y_axis.push(a);

                    $scope.documents_total_y_axis.push(a);
                    $scope.searches_total_y_axis.push(a);
                    $scope.sessions_total_y_axis.push(a);
                }
                // console.log($scope.productinfo);
            }
            $scope.documents_onsite_y_axis.reverse();
            $scope.searches_onsite_y_axis.reverse();
            $scope.sessions_onsite_y_axis.reverse();


            $scope.documents_remote_y_axis.reverse();
            $scope.searches_remote_y_axis.reverse();
            $scope.sessions_remote_y_axis.reverse();


            $scope.documents_individual_y_axis.reverse();
            $scope.searches_individual_y_axis.reverse();
            $scope.sessions_individual_y_axis.reverse();

            $scope.documents_total_y_axis.reverse();
            $scope.searches_total_y_axis.reverse();
            $scope.sessions_total_y_axis.reverse();

















            $scope.documents_onsite_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.searches_onsite_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.sessions_onsite_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);


            $scope.documents_remote_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.searches_remote_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.sessions_remote_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);


            $scope.documents_individual_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.searches_individual_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.sessions_individual_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);

            $scope.documents_total_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.searches_total_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);
            $scope.sessions_total_y_axis.splice(num_of_months_to_show, Number.MAX_VALUE);


        }
        $scope.calculate_remote_onsite_ind_total = function() {
            $scope.usageinfo = sharedProperties.get_usageinfo_property();

            $scope.documents_total_y_axis = [];
            $scope.searches_total_y_axis = [];
            $scope.sessions_total_y_axis = [];

            $scope.documents_onsite_y_axis = [];
            $scope.searches_onsite_y_axis = [];
            $scope.sessions_onsite_y_axis = [];

            $scope.documents_remote_y_axis = [];
            $scope.searches_remote_y_axis = [];
            $scope.sessions_remote_y_axis = [];

            $scope.documents_individual_y_axis = [];
            $scope.searches_individual_y_axis = [];
            $scope.sessions_individual_y_axis = [];



            $scope.month_dates_x_axis = month_dates_x_axis_actual_on_graph;
            var lengthofmonthsarray = month_dates_x_axis.length;
            for (var i = 0; i < lengthofmonthsarray; i++) {
                //console.log(month_dates_x_axis[i]);
                //building documents sessions searches y axis arrays. 
                if ($scope.usageinfo.result[month_dates_x_axis[i]]) {
                    $scope.documents_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.documents);
                    $scope.searches_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.searches);
                    $scope.sessions_onsite_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].onsite.sessions);


                    $scope.documents_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.documents);
                    $scope.searches_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.searches);
                    $scope.sessions_remote_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].remote.sessions);


                    $scope.documents_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.documents);
                    $scope.searches_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.searches);
                    $scope.sessions_individual_y_axis.push($scope.usageinfo.result[month_dates_x_axis[i]].individual.sessions);

                    $scope.documents_total_y_axis.push($scope.documents_onsite_y_axis[i] + $scope.documents_remote_y_axis[i] +
                            $scope.documents_individual_y_axis[i]);
                    $scope.searches_total_y_axis.push($scope.searches_onsite_y_axis[i] + $scope.searches_remote_y_axis[i] +
                            $scope.searches_individual_y_axis[i]);
                    $scope.sessions_total_y_axis.push($scope.sessions_onsite_y_axis[i] + $scope.sessions_remote_y_axis[i] +
                            $scope.sessions_individual_y_axis[i]);
                } else {
                    var a = 'na';//no data for the month so some random data to show no data.
                    $scope.documents_onsite_y_axis.push(a);
                    $scope.searches_onsite_y_axis.push(a);
                    $scope.sessions_onsite_y_axis.push(a);


                    $scope.documents_remote_y_axis.push(a);
                    $scope.searches_remote_y_axis.push(a);
                    $scope.sessions_remote_y_axis.push(a);


                    $scope.documents_individual_y_axis.push(a);
                    $scope.searches_individual_y_axis.push(a);
                    $scope.sessions_individual_y_axis.push(a);

                    $scope.documents_total_y_axis.push(a);
                    $scope.searches_total_y_axis.push(a);
                    $scope.sessions_total_y_axis.push(a);
                }
                // console.log($scope.productinfo);
            }
        }
        $scope.calculate_remote_onsite_ind_total();//calling graph y axis 
        $scope.filename = "test";
        //  $scope.getArray = [{a: 1, b:2}, {a:3, b:4}];
        //below is for the csv
        $scope.getArray = [$scope.documents_total_y_axis,
            $scope.searches_total_y_axis,
            $scope.sessions_total_y_axis];

//      $scope.addRandomRow = function() {
//        $scope.getArray.push({a: Math.floor((Math.random()*10)+1), b: Math.floor((Math.random()*10)+1)});
//      };
//
//      $scope.getHeader = function () {return ["A", "B"]};
//
//      $scope.clickFn = function() {
//        console.log("click click click");
//      };

        $scope.plus_button = {};
        $scope.plus_toggle = function(id) {
            if ($scope.plus_button[id] == 1) {
                $scope.plus_button[id] = 0;
            } else {
                $scope.plus_button[id] = 1;
            }


        }





        $scope.addPoints = function() {
            var seriesArray = $scope.chartConfig.series;
            //console.log(Math.random() * seriesArray.length);
            //Math.random() function returns a floating-point, pseudo-random number in the range [0, 1) 
            var rndIdx = Math.floor(Math.random() * seriesArray.length);
            ////for ex:-  rndidx will be 0 or 1 if two element array.
            if ($scope.count == 0)
                seriesArray[0].data = seriesArray[0].data.concat([15, 10, 20]);//1,10,20 three points added dynamically.
            var rndIdx = Math.floor(Math.random() * seriesArray.length);
            ////for ex:-  rndidx will be 0 or 1 if two element array.
            if ($scope.count == 1)
                seriesArray[1].data = seriesArray[1].data.concat([150000, 100000, 200000]);//1,10,20 three points added dynamically.
            $scope.count++;
        };

        $scope.addPoints_Series = function(id) {
            var seriesArray = $scope.chartConfig.series;

            seriesArray[id].data = seriesArray[id].data.concat([150000, 100000, 200000]);//1,10,20 three points added dynamically.

        };

        $scope.addSeries = function() {
            var rnd = []
            for (var i = 0; i < 12; i++) {
                rnd.push(Math.floor(Math.random() * 100000) + 1)
            }
            $scope.chartConfig.series.push({
                data: rnd
            })
        }



        $scope.changegridvalues = function() {
            if ($scope.tab == 1) {
                $scope.documents_grid = $scope.documents_total_y_axis;
                $scope.searches_grid = $scope.searches_total_y_axis;
                $scope.sessions_grid = $scope.sessions_total_y_axis;
            }
            else if ($scope.tab == 2)
            {

                $scope.documents_grid = $scope.documents_remote_y_axis;
                $scope.searches_grid = $scope.searches_remote_y_axis;
                $scope.sessions_grid = $scope.sessions_remote_y_axis;
            }
            else if ($scope.tab == 3) {
                $scope.documents_grid = $scope.documents_onsite_y_axis;
                $scope.searches_grid = $scope.searches_onsite_y_axis;
                $scope.sessions_grid = $scope.sessions_onsite_y_axis;
            }
            else if ($scope.tab == 4) {
                $scope.documents_grid = $scope.documents_individual_y_axis;
                $scope.searches_grid = $scope.searches_individual_y_axis;
                $scope.sessions_grid = $scope.sessions_individual_y_axis;
            }

        }
        $scope.changegridvalues();//calling the above fucntion********

        $scope.replaceSeries_all = function(id) {
            var seriesArray = $scope.chartConfig.series;
            $scope.tab = id;//tab that we want to be selected
            seriesArray.splice(0, Number.MAX_VALUE);
            seriesArray.splice(1, Number.MAX_VALUE);
            seriesArray.splice(2, Number.MAX_VALUE);
//            var rnd = []
//            for (var i = 0; i < num_of_months_to_show; i++) {
//                rnd.push(Math.floor(Math.random() * 100000) + 1)
//            }
            if (id == 1) {
                $scope.chartConfig.series.push({
                    data: $scope.documents_total_y_axis,
                    name: 'documents',
                    color: color[0]
                });
                $scope.chartConfig.series.push({
                    data: $scope.searches_total_y_axis,
                    color: color[1],
                    name: 'searches'
                });
                $scope.chartConfig.series.push({
                    data: $scope.sessions_total_y_axis,
                    color: color[2],
                    name: 'sessions'
                });
            }
            else if (id == 2) {
                $scope.chartConfig.series.push({
                    data: $scope.documents_remote_y_axis,
                    name: 'documents',
                    color: color[0]
                });
                $scope.chartConfig.series.push({
                    data: $scope.searches_remote_y_axis,
                    color: color[1],
                    name: 'searches'
                });
                $scope.chartConfig.series.push({
                    data: $scope.sessions_remote_y_axis,
                    color: color[2],
                    name: 'sessions'
                });
            }
            else if (id == 3) {

                $scope.chartConfig.series.push({
                    data: $scope.documents_onsite_y_axis,
                    name: 'documents',
                    color: color[0]
                });
                $scope.chartConfig.series.push({
                    data: $scope.searches_onsite_y_axis,
                    color: color[1],
                    name: 'searches'
                });
                $scope.chartConfig.series.push({
                    data: $scope.sessions_onsite_y_axis,
                    color: color[2],
                    name: 'sessions'
                });
            }
            else if (id == 4) {
                $scope.chartConfig.series.push({
                    data: $scope.documents_individual_y_axis,
                    name: 'documents',
                    color: color[0]
                });
                $scope.chartConfig.series.push({
                    data: $scope.searches_individual_y_axis,
                    color: color[1],
                    name: 'searches'
                });
                $scope.chartConfig.series.push({
                    data: $scope.sessions_individual_y_axis,
                    color: color[2],
                    name: 'sessions'
                });
            }

            $scope.changegridvalues();
            $scope.chartConfig.options.xAxis.categories = month_dates_x_axis_actual_on_graph;
//            console.log( $scope.chartConfig.series);
        }

//       


        $scope.print = function() {
            var chart = this.chartConfig.getHighcharts();
            chart.print();
        }
        $scope.printIt = function() {
            $(".header").hide();


            window.print();
            $(".header").show();
        };
        $scope.print_page = function() {//try to use this for print
            console.log('modal print');

            var table = document.querySelector('.mainContent').innerHTML;
            var myWindow = window.open('', '', 'width=800, height=600');
            myWindow.document.write('<div ng-view="" class="wrapper ng-scope">' + table + '</div><link href="/css/statsrep5/global.css" rel="stylesheet" type="text/css" />' +
                    '<link href="/css/statsrep5/sdls_global.css" rel="stylesheet" type="text/css" />' +
                    '<link rel="stylesheet" type="text/css" href="/css/statsrep5/normalize.css"/>' +
                    '<link href="/css/statsrep5/tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-device-width: 768px)" />' +
                    '<link href="/css/statsrep5/desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-device-width:1024px)" />'


                    );
            myWindow.print();

        };
        $scope.toggleLoading = function() {
            this.chartConfig.loading = !this.chartConfig.loading
        }






        $scope.modalShown = false;//on page load no modal shown
        $scope.toggleModal = function() {
            $scope.modalShown = !$scope.modalShown;
        }
        $scope.run = function() {
            document.title = 'Loading...';
             
            //once submitted the post data needs to be put in below property for next controller to access it 
            //  post_to_chart_properties.setProperty($scope.rpt);
            //we get the property right here and also in the next controller(chart controller).
            // var posted_data =  {"rpt_type":"OUS","year":"2009-04-01","prodfamily":"bkflix","radioincludesites":"yes"}//post_to_chart_properties.getProperty();//only the html element values on selector page

            var dates = Object.keys($scope.backenddata.result.usagedates);
            posted_data.year = dates[dates.indexOf(month_dates_x_axis[0]) - 1]//"2009-04-01";
//            console.log(  posted_data.year);
            var key = '';
            var i = 0;


            var startdate = '';

            var endoffor = dates.indexOf(posted_data.year) - prev_next_months_count;//dont put this in for loop
            for (i = dates.indexOf(posted_data.year); i > endoffor; i--) {
                if (dates[i]) {
                    startdate = dates[i];//earlier date.
                    //num_of_months_to_show 15 month dates have been calculated. start date comes from that. 



                }


            }

            if (posted_data.radioincludesites == 'yes') {
                var customers = Object.keys($scope.backenddata.result.children)
            } else {
                var customers = [$scope.backenddata.result.customerid];
            }
            if (posted_data.prodfamily == 'GO') {
                var prodfamily_arr = $scope.backenddata.result.goproducts;
                //if go is chosen then go products array is passed. 
            } else {
                var prodfamily_arr = [posted_data.prodfamily];
            }

            if (startdate && posted_data.year) {
                $scope.modalcontent = '';//no content only loading image.
                $scope.loading_image_show = true;
                $scope.toggleModal();

                usageSummary.usageinfo($scope.backenddata.result.customerid, startdate,
                        posted_data.year, prodfamily_arr, customers)
                        .success(function(data) {//success callback
                            $scope.usageinfo = data;
                            // console.log(data);
                            sharedProperties.set_usageinfo_property2($scope.usageinfo);


                            if ($scope.usageinfo.result.length != 0) {

                                $location.path('/chart');//after everything send to chart controller.
                            }

                            else {
                                $scope.loading_image_show = false;
                                $scope.modalcontent = "There are no statistics available for this product for the time period you have specified." +
                                        "Please verify that you have selected a time period for which you had an active " +
                                        "subscription to the product.";
                                $scope.toggleModal();
                                $scope.toggleModal();
                                // alert("There are no statistics available for this product for the time period you have specified." +
                                //         "Please verify that you have selected a time period for which you had an active " +
                                //         "subscription to the product.");
                            }
                            $scope.calculate_months_xaxis2(posted_data);
                            $scope.calculate_remote_onsite_ind_total2();
                            $scope.replaceSeries_all(1);



                        }).error(function() {
                    $scope.toggleModal();//hide the modal
                }).finally(function() {
                    document.title = 'Scholastic Statistical Reporting';

                    $scope.toggleModal();
                });
            }
        }



        $scope.run2 = function() {
            document.title = 'Loading...';
            //once submitted the post data needs to be put in below property for next controller to access it 
            //  post_to_chart_properties.setProperty($scope.rpt);
            //we get the property right here and also in the next controller(chart controller).
            // var posted_data =  {"rpt_type":"OUS","year":"2009-04-01","prodfamily":"bkflix","radioincludesites":"yes"}//post_to_chart_properties.getProperty();//only the html element values on selector page

            var dates = Object.keys($scope.backenddata.result.usagedates);
            posted_data.year = month_dates_x_axis[month_dates_x_axis.length - 1];//"2009-04-01";
            //   console.log(  posted_data.year);
            var key = '';
            var i = 0;


            var startdate = dates[dates.indexOf(posted_data.year) + 1];
            var enddate = '';
            var endoffor = dates.indexOf(posted_data.year) + prev_next_months_count;//dont put this in for loop
            for (i = dates.indexOf(posted_data.year); i <= endoffor; i++) {
                if (dates[i]) {
                    enddate = dates[i];//earlier date.
                    //num_of_months_to_show 15 month dates have been calculated. start date comes from that. 



                }


            }

            if (posted_data.radioincludesites == 'yes') {
                var customers = Object.keys($scope.backenddata.result.children)
            } else {
                var customers = [$scope.backenddata.result.customerid];
            }
            if (posted_data.prodfamily == 'GO') {
                var prodfamily_arr = $scope.backenddata.result.goproducts;
                //if go is chosen then go products array is passed. 
            } else {
                var prodfamily_arr = [posted_data.prodfamily];
            }

            if (startdate && enddate) {
                $scope.modalcontent = '';//no content only loading image.
                $scope.loading_image_show = true;
                $scope.toggleModal();

                usageSummary.usageinfo($scope.backenddata.result.customerid, startdate,
                        enddate, prodfamily_arr, customers)
                        .success(function(data) {//success callback
                            $scope.usageinfo = data;
                            // console.log(data);
                            sharedProperties.set_usageinfo_property2($scope.usageinfo);


                            if ($scope.usageinfo.result.length != 0) {

                                $location.path('/chart');//after everything send to chart controller.
                            }

                            else {
                                $scope.loading_image_show = false;
                                $scope.modalcontent = "There are no statistics available for this product for the time period you have specified." +
                                        "Please verify that you have selected a time period for which you had an active " +
                                        "subscription to the product.";
                                $scope.toggleModal();
                                $scope.toggleModal();
                                // alert("There are no statistics available for this product for the time period you have specified." +
                                //         "Please verify that you have selected a time period for which you had an active " +
                                //         "subscription to the product.");
                            }
                            $scope.calculate_months_xaxis3(posted_data, enddate);
                            console.log(month_dates_x_axis_actual_on_graph);
                            $scope.calculate_remote_onsite_ind_total3();
                            $scope.replaceSeries_all(1);



                        }).error(function() {
                    $scope.toggleModal();//hide the modal
                }).finally(function() {
                    document.title = 'Scholastic Statistical Reporting';

                    $scope.toggleModal();
                });
            }
        }








        Highcharts.setOptions({
            lang: {
                decimalPoint: '.',
                thousandsSep: ','
            }
        });
        $scope.chartConfig = {
            
            options: {
                chart: {
                    type: 'column',
//                    inverted: true
                },
                title: {
                    text: 'Total Usage',
                },
                subtitle: {
//            text: 'Source: WorldClimate.com'
                },
                xAxis: {
//                    categories: [
//                        'Jan',
//                        'Feb',
//                        'Mar',
//                        'Apr',
//                        'May',
//                        'Jun',
//                        'Jul',
//                        'Aug',
//                        'Sep',
//                        'Oct',
//                        'Nov',
//                        'Dec'
//                    ],
                    categories: month_dates_x_axis_actual_on_graph,
                    crosshair: true,
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Overall Usage'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }],
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true,
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 2,
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
            },
            series: [
                //below is two objects element array  year over year usage report hardcoded trying to create 
                {
                    name: 'documents',
                    data: $scope.documents_total_y_axis, //[50000, 71500, 106400, 129200, 144.0, 176000, 13500, 148500, 216400, 105.0, 104300, 91200],
                    // data : [],
                    color: color[0],
//    pointPadding: 0.5,
//     dataLabels: {
//                    enabled: true,
//                    align: 'right',
//                    color: '#FFFFFF',
//                    x: 20,
//                    y: -80,
//                    allowOverlap : true,
////                      format: "{point.y} K",
//                       formatter: function () {
//        return Highcharts.numberFormat(this.y,0);
//    }
//                },

                },
                {
                    name: 'searches',
                    data: $scope.searches_total_y_axis, //[84500, 78800, 98500, 93400, 106000, 84500, 105.0, 104300, 91200, 13500, 148500, 216400],
                    //  data : [],
// ,pointPadding: .01,
//  dataLabels: {
//                    enabled: true,
//                    align: 'right',
                    color: color[1],
//                    y: -10,
//                      format: this.y,
//                },
                },
                {
                    name: 'sessions',
                    data: $scope.sessions_total_y_axis, //[84500, 78800, 98500, 93400, 106000, 84500, 105.0, 104300, 91200, 13500, 148500, 216400],
                    //  data : [],
// ,pointPadding: .01,
//  dataLabels: {
//                    enabled: true,
//                    align: 'right',
                    color: color[2],
//                    y: -10,
//                      format: this.y,
//                },
                }

            ],
            title: {
                text: $scope.title,
            },
            loading: false,
        }



        $scope.removeRandomSeries = function() {
            var seriesArray = $scope.chartConfig.series
            var rndIdx = Math.floor(Math.random() * seriesArray.length);
            seriesArray.splice(rndIdx, 1);
            //array.splice(start, deleteCount[, item1[, item2[, ...]]])
        }
        $scope.removeSeries = function(id) {
            var seriesArray = $scope.chartConfig.series

            seriesArray.splice(id, 1);
            //array.splice(start, deleteCount[, item1[, item2[, ...]]])
        }

        $scope.swapChartType = function() {
            if (this.chartConfig.options.chart.type === 'line') {
                this.chartConfig.options.chart.type = 'column';//was bar before. column and line are two graphs
            } else {
                this.chartConfig.options.chart.type = 'line'
                this.chartConfig.options.chart.zoomType = 'x'
            }
        }
        }

    }]
        );