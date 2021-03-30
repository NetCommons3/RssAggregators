/**
 * @fileoverview RssAggregators Javascript
 * @author nakajimashouhei@gmail.com (Shohei Nakajima)
 * @author exkazuu@willbooster.com (Kazunori Sakamoto)
 */

DATA_SERVER_URL = 'http://localhost:3000';

/**
 * RssAggregator Item Controller Javascript
 *
 * @param {string} Controller name
 * @param {function($scope, $http)} Controller
 */
NetCommonsApp.controller('RssAggregatorsItem',
    ['$scope', '$http', function($scope, $http) {

      /**
       * initialize
       *
       * @return {void}
       */
      $scope.initialize = function(hostname, rangeId) {
        $scope.topicCount = '-';
        $scope.pageViewCount = '-';
        isWeekly = rangeId === 'week';
        $http.get(DATA_SERVER_URL + '/topic-count?hostname=' + hostname + '&isWeekly=' + isWeekly)
          .then(
            function(response) {
              $scope.topicCount = response.data.count;
            },
            function() {
            });
        $http.get(DATA_SERVER_URL + '/page-view-count?hostname=' + hostname + '&isWeekly=' + isWeekly)
          .then(
            function(response) {
              $scope.pageViewCount = response.data.count;
            },
            function() {
            });
      };
    }]);
