/* show or hide employee list */
function myFunction() {
  var x = document.getElementById("employee_list");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;


/* show or hide leave category */
function showleave() {
  var x = document.getElementById("leavecategory");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide employee list */
function showholiday() {
  var x = document.getElementById("holiday_list");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide ADD HOLIDAY list */
function addholiday() {
  var x = document.getElementById("addholiday");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide add employee form */
function addemployee() {
  var x = document.getElementById("addemployee");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide BRANCH LIST */
function showbrach() {
  var x = document.getElementById("branch_list");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide addbranch form BRANCH LIST */
function addb() {
  var x = document.getElementById("addbranches");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* show or hide addbranch form WORKING DAYS LIST */
function working() {
  var x = document.getElementById("working_days");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} ;

/* delete eumployee id */
function deleteajax(employee){
var delet = confirm("ARE YOU SURE TO DELETE ?");
  if(delet==true){
    $.ajax({
      type:"post",
      url:"deleteemployees.php",
      data:{
        delete_id :employee},
        success:function(data){
          alert(data);
          window.location.href="dashboard.php";
          }
    })
  }
  else{
    window.location.href="dashboard.php";
  }
};

/* delete holisY */
function deleteholiday(holiday){
  var delet = confirm("ARE YOU SURE TO DELETE ?");
    if(delet==true){
      $.ajax({
        type:"post",
        url:"deleteholiday.php",
        data:{
          holiday_id :holiday},
          success:function(data){
            alert(data);
            window.location.href="dashboard.php";
            }
      })
    }
    else{
      window.location.href="dashboard.php";
    }
  };
  

/* edit employee list */
function edit(employee_id){
  $.ajax({
    type:"post",
    url:"updateemployee.php",
    data:
    {
      id:employee_id,
      firstname:$(".fname" + employee_id).val(),
      lname:$(".lname" + employee_id).val(),
      email:$(".email" + employee_id).val(),
      position:$(".position" + employee_id).val(),
      branch:$(".bname" + employee_id).val()
    },
    success:function(data){
      alert(data);
    }
  })
};

/* add employee */
function add(){
  $.ajax({
    type:"post",
    url:"addemployee.php",
    data:
    {
    fn:$("#addfirstname").val(),
    ln:$("#addlastname").val(),
    ea:$("#addemail").val(),
    pp:$("#addposition").val(),
    bb:$("#addbranch").val()
    },
    success:function(data){
      alert(data);
    }
      })
}

/* add branche */
function addbranch(){
  $.ajax({
    type:"post",
    url:"addbranch.php",
    data:
    {
      bname:$("#branches").val()
    },
    success:function(data){
      alert(data);
    }
  })
}

/* delete BRANCH id */
function deletebranch(branch_id){
  var delet = confirm("ARE YOU SURE TO DELETE ?");
    if(delet==true){
      $.ajax({
        type:"post",
        url:"deletebranches.php",
        data:{
          branchid :branch_id},
          success:function(data){
            alert(data);
            window.location.href="dashboard.php";
            }
      })
    }
    else{
      window.location.href="dashboard.php";
    }
  };
 /* edit branch  */
  function editbranch(branch_id){
    $.ajax({
      type:"post",
      url:"updatebranch.php",
      data:
      {
        id:branch_id,
        name:$(".names" + branch_id).val()
      },
      success:function(data){
        alert(data);
      }
    });
  };

  /* edit holisY  */
  function day(holiday_id){
    $.ajax({
      type:"post",
      url:"updateholiday.php",
      data:
      {
        holidayid:holiday_id,
        event:$(".event" + holiday_id).val(),
        start: $(".start" + holiday_id).val(),
        end:$(".end" + holiday_id).val()
      },
      success:function(data){
        alert(data);
      }
    });
  }

   /* edit working days */
   function editworkingdays(days_id){
    $.ajax({
      type:"post",
      url:"workingdays.php",
      data:
      {
        id:days_id,
        monday:$(".monday" + days_id).val(),
        tuesday:$(".tuesday" + days_id).val(),
        wednessday:$(".wednessday" + days_id).val(),
        thursday:$(".thursday" + days_id).val(),
        friday:$(".friday" + days_id).val(),
        saturday:$(".saturday" + days_id).val(),
        sunday:$(".sunday" + days_id).val(),
      },
      success:function(data){
        alert(data);
      }
    });
  }

  /*add holiday */
  function dayadd(){
    $.ajax({
    type:"post",
    url:"insertholiday.php",
    data:
    {
      addevent :$("#addevent").val(),
      addstart :$("#addstart").val(),
      addend :$("#addend").val()
    },
    success:function(data){
      alert(data);
    }
  })
  };

/*add leave */
function addleave(){
  $.ajax({
  type:"post",
  url:"insertleave.php",
  data:
  {
    addleave :$("#addleave").val(),
    },
  success:function(data){
    alert(data);
  }
})
};

   /* edit Leave  */
   function editleave(leave_id){
    $.ajax({
      type:"post",
      url:"updateleave.php",
      data:
      {
        id:leave_id,
        leave:$(".leave" + leave_id).val()
      },
      success:function(data){
        alert(data);
      }
    });
  };

  /* delete leave id */
function deleteleave(leave_id){
  var delet = confirm("ARE YOU SURE TO DELETE ?");
    if(delet==true){
      $.ajax({
        type:"post",
        url:"deleteleave.php",
        data:{
          leaveid :leave_id},
          success:function(data){
            alert(data);
            window.location.href="dashboard.php";
            }
      })
    }
    else{
      window.location.href="dashboard.php";
    }
  };

  
  function payoll(){
    $.ajax({
      url:"payroll.php",
      type:"post",
      data:
      {
        position:$("#employee_p").val(),
        salary:$("#employee_salary_amount").val(),
        tax:$("#employee_tax_amount").val()
      },
      success:function(data)
      {
     alert(data);
        
      }
    });
  };

