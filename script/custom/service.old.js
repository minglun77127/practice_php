var userService = new function(){
	this.deleteStudentByID = function(studentId){
		return $.postAsObservable('request/deleteStudent.php',{'studentId': studentId})
			    .map(res=>res.data)
				.catch(error=>console.log(error));
	};
};