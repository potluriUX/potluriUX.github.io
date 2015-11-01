<div header ></div>

 <div class="mainContent">
     <div class="exportLinks">
          <button class="btn btn-default"
              ng-csv="getArray" filename="{{ filename }}.csv" field-separator="{{separator}}" decimal-separator="{{decimalSeparator}}"
              >Export to CSV</button>
         <a href="#">Export Grid to Excel</a> | <a href="" ng-click='printIt()'>PDF</a></div>
<div class="breadcrumbs"><a href="#report">Back to Report Selector</a></div>
<h1 class="rptTitle"><span class="schDis">Fairfax County Public Schools</span> <span class="prod">{{title}}</span></h1>
<h4 class="rptSubTitle">Overall Usage Summary</h4>
<!--  <div ng-app="StatsApp">
    <div ng-controller="ChartController">-->
<div class="tabGrp">
		<div class="tabs">
			<div ng-click="replaceSeries_all(1)" ng-class="{active: tab==1}" id="tab_01" class="tab ">Total Usage</div>
			<!--ng-class tutorial add the 'active' to class if tab==1(expression
                        is true. in controller set tab to 1-->
                        <div ng-click="replaceSeries_all(2)" ng-class="{active: tab==2}" id="tab_02" class="tab">Remote Usage</div>
			<div ng-click="replaceSeries_all(3)"  ng-class="{active: tab==3}"id="tab_03" class="tab ">Onsite Usage</div>
			<div ng-click="replaceSeries_all(4)" ng-class="{active: tab==4}" id="tab_04" class="tab">Individual Usage</div>
			 <div ng-click="swapChartType()" class="tab">Toggle Line/Bar</div>
                        <br class="clearfloat">
			</div>
		
    <div class="prevNext"><a href="" ng-click="run()" class="prev">&lt; Previous 6 months</a> <a href="" ng-click="run2()" class="next">Next 6 months &gt;</a></div>
		
		
	
        <div class="span12">
            <!--<input ng-model="chartConfig.title.text">-->
            <!--<button ng-click="addSeries()">Add Series</button>-->
            <!--<button ng-click="addPoints()">Add Points</button><br><br>-->
            <!--<button ng-click="addPoints_Series(1)">Add 2015 points</button>-->
            <!--<button ng-click="removeRandomSeries()">Remove Random Series</button>-->
             <!--<button ng-click="removeSeries(1)">Remove 2015 </button>-->
<!--              <a href='#report'><< Back</a>
              <button ng-click="replaceSeries_onsite()">Onsite Usage </button>
              <button ng-click="replaceSeries_remote()">Remote Usage </button>
              <button ng-click="replaceSeries_individual()">Individual Usage </button>-->
           
           
            <!--<button ng-click="toggleLoading()">Loading?</button>-->
            <!--<button ng-click="print()">Print</button>-->
        </div>
        <div class="row">
            <highchart id="chart1" config="chartConfig" class="smallWidth"></highchart>
        </div>
                <p></p>
    </div>

<div id="rptData">
		<div class="dataTblWrapper">
<table class="dataTbl totUsgTbl data15mo hdrTbl">
<tr>
					<th>&nbsp;</th>
                                        <th scope='col'   ng-repeat="x in month_dates_x_axis track by $index" >{{ x }}</th>
					<!--nowrap-->
					</tr>
  <tr >
       <th scope="row">
           <a  ng-click='plus_toggle(1)' ng-class="{open: plus_button==1, closed:plus_button[1]!=1}" class="toggleBtn " rel=".sub01" href="">Documents</a></th>
   <td ng-repeat="x in documents_grid track by $index" >{{ x }}</td>
   
  </tr>
 
    <tr >
       <th scope="row">
           <a ng-click='plus_toggle(2)' ng-class="{open: plus_button==1, closed:plus_button[2]!=1}" class="toggleBtn " rel=".sub01" href="">Sessions</a></th>
   <td ng-repeat="x in sessions_grid track by $index" >{{ x }}</td>
   
  </tr>
  
    <tr >
       <th scope="row"><a ng-click='plus_toggle(3)' ng-class="{open: plus_button[3]==1, closed:plus_button[3]!=1}" class="toggleBtn " rel=".sub01" href="">Searches</a></th>
   <td ng-repeat="x in searches_grid track by $index" >{{ x }}</td>
   
  </tr>
</table>

			<table class="dataTbl totUsgTbl data15mo hdrTbl">
				<tr>
					<th>&nbsp;</th>
					<th scope="col">Apr-14</th>
					<th scope="col">May-14</th>
					<th scope="col">Jun-14</th>
					<th scope="col">Jul-14</th>
					<th scope="col">Aug-14</th>
					<th scope="col">Sep-14</th>
					<th scope="col">Oct-14</th>
					<th scope="col">Nov-14</th>
					<th scope="col">Dec-14</th>
					<th scope="col">Jan-15</th>
					<th scope="col">Feb-15</th>
					<th scope="col">Mar-15</th>
					<th scope="col">Apr-15</th>
					<th scope="col">May-15</th>
					<th scope="col">Jun-15</th>
					</tr>
				<tr>
					<th scope="row"><a class="toggleBtn closed" rel=".sub01" href="#">Documents</a></th>
					<td>108000</td>
					<td>47000</td>
					<td>52000</td>
					<td>137</td>
					<td>1345</td>
					<td>21223</td>
					<td>110780</td>
					<td>104455</td>
					<td>110780</td>
					<td>142817</td>
					<td>188503</td>
					<td>142817</td>
					<td>110780</td>
					<td>48861</td>
					<td>64094</td>
					</tr>
				
				<tr class="subsetRow sub01" ng-if="plus_button[1] == 1">
					<th scope="row">Amazing Animals</th>
					<td>21600</td>
					<td>9400</td>
					<td>10400</td>
					<td>27</td>
					<td>269</td>
					<td>4244</td>
					<td>22156</td>
					<td>20891</td>
					<td>22156</td>
					<td>28563</td>
					<td>37700</td>
					<td>28563</td>
					<td>22156</td>
					<td>9772</td>
					<td>12818</td>
					</tr>
				<tr class="subsetRow sub01" ng-if="plus_button[2] == 1">
					<th scope="row">America the Beautiful</th>
					<td>21600</td>
					<td>9400</td>
					<td>10400</td>
					<td>27</td>
					<td>269</td>
					<td>4244</td>
					<td>22156</td>
					<td>20891</td>
					<td>22156</td>
					<td>28563</td>
					<td>37700</td>
					<td>28563</td>
					<td>22156</td>
					<td>9772</td>
					<td>12818</td>
					</tr>
				<tr class="subsetRow sub01" style="display: none;">
					<th scope="row">Encyclopedia Americana</th>
					<td>21600</td>
					<td>9400</td>
					<td>10400</td>
					<td>27</td>
					<td>269</td>
					<td>4244</td>
					<td>22156</td>
					<td>20891</td>
					<td>22156</td>
					<td>28563</td>
					<td>37700</td>
					<td>28563</td>
					<td>22156</td>
					<td>9772</td>
					<td>12818</td>
					</tr>
				<tr class="subsetRow sub01" style="display: none;">
					<th scope="row">The Grolier Multimedia Encyclopedia</th>
					<td>21600</td>
					<td>9400</td>
					<td>10400</td>
					<td>27</td>
					<td>269</td>
					<td>4244</td>
					<td>22156</td>
					<td>20891</td>
					<td>22156</td>
					<td>28563</td>
					<td>37700</td>
					<td>28563</td>
					<td>22156</td>
					<td>9772</td>
					<td>12818</td>
					</tr>
				<tr class="subsetRow sub01" style="display: none;">
					<th scope="row">Grolier Online</th>
					<td>21600</td>
					<td>9400</td>
					<td>10400</td>
					<td>27</td>
					<td>269</td>
					<td>4244</td>
					<td>22156</td>
					<td>20891</td>
					<td>22156</td>
					<td>28563</td>
					<td>37700</td>
					<td>28563</td>
					<td>22156</td>
					<td>9772</td>
					<td>12818</td>
					</tr>
				
				<tr>
					<th scope="row">Sessions</th>
					<td>126248</td>
					<td>93421</td>
					<td>192</td>
					<td>235</td>
					<td>2353</td>
					<td>73123</td>
					<td>134733</td>
					<td>46452</td>
					<td>134733</td>
					<td>188503</td>
					<td>104455</td>
					<td>188503</td>
					<td>134733</td>
					<td>94564</td>
					<td>121266</td>
					</tr>
				<tr>
					<th scope="row">Searches</th>
					<td>400532</td>
					<td>239768</td>
					<td>104384</td>
					<td>744</td>
					<td>7396</td>
					<td>188692</td>
					<td>491026</td>
					<td>304814</td>
					<td>491026</td>
					<td>662640</td>
					<td>585916</td>
					<td>662640</td>
					<td>491026</td>
					<td>286850</td>
					<td>370720</td>
					</tr>
				</table>
			</div>
	</div>

 </div>
</div>
 <!-- end .tabGrp --></div>
<div footer></div>

<modal-dialog show='modalShown' width='400px' height='150px' info='loading_image_show'>
       <!-- {{rpt.rpt_type}}-->
      <p><br><br>{{modalcontent}}
          <img ng-if='loading_image_show' class="loading" src="/statsrep5_images/graph-loading-1.gif" 
               width="100" height="65" alt="loading..." /></p>
    </modal-dialog>
  
