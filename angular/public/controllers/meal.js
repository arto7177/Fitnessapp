 angular.module('app')
    .controller('meal', function($http){
        var self = this;
        self.newrow = {};
        self.term = null;
        self.choices = [];
        $http.get("/meal")
        .success(function(data){
            self.rows = data;
        });
        
        self.create = function(){
            var a = $('#newMeal').serializeArray();
            var row={};
            $.each(a, function() {
                if (row[this.name] !== undefined) {
                    if (!row[this.name].push) {
                        row[this.name] = [row[this.name]];
                    }
                    row[this.name].push(this.value || '');
                }
                else {
                    row[this.name] = this.value || '';
                }
            });
            $http.post('/meal/', row)
            .success(function(data){
                data.isEditing = false;
                self.rows.push(data);
            }).error(function(data){
                alert(data.code);
            });
            
        };
        self.edit = function(row, index){
            row.isEditing = true;
        };
        self.save = function(row, index){
            $http.post('/meal/', row)
            .success(function(data){
                data.isEditing = false;
                self.rows[index] = data;
            }).error(function(data){
                alert(data.code);
            });
        };
        self.delete = function(row, index){
            self.d = {
                title: "Delete a meal",
                body: "Are you sure you want to delete " + row.mealname + "on " +row.date+"?",
                confirm: function(){
                    $http.delete('/meal/' + row.id)
                    .success(function(data){
                        self.rows.splice(index, 1);
                        $("#myDialog").modal('hide');
                    }).error(function(data){
                        alert(data.code);
                    });
                }
            };
            $("#myDialog").modal('show');
        };
        self.search = function(){
            $http.get("/meal/search/" + self.term)
            .success(function(data){
                self.choices = data.hits;
            });
        };
        self.choose = function(choice){
            self.newrow.calories = choice.fields.nf_calories;
            self.choices = [];
            $('#mealcalc').modal('hide');
        };
    });