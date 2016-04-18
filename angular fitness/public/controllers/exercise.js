 angular.module('app')
    .controller('exercise', function($http){
        var self = this;
        
        $http.get("/exercise")
        .success(function(data){
            self.rows = data;
        });
        
        self.create = function(){
            var a = $('#newExercise').serializeArray();
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
            $http.post('/exercise/', row)
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
            $http.post('/exercise/', row)
            .success(function(data){
                data.isEditing = false;
                self.rows[index] = data;
            }).error(function(data){
                alert(data.code);
            });
        };
        self.delete = function(row, index){
            self.d = {
                title: "Delete a exercise",
                body: "Are you sure you want to delete " + row.Name + "?",
                confirm: function(){
                    $http.delete('/exercise/' + row.id)
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

    });