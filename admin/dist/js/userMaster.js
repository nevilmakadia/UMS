// User Master DataTable
$(function () {
  $("#userMasterTable").DataTable({
    paging: true,
    lengthChange: true,
    lengthMenu: [5, 10, 20, 50, 100],
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    pageLength: 5,
  });
});

// Display Image After Select
$(document).ready(() => {
  $("#u_profile_image").change(function () {
    const file = this.files[0];
    console.log(file);
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        console.log(event.target.result);
        $("#imgPreview").attr("src", event.target.result).height(100);
      };
      reader.readAsDataURL(file);
    }
  });
});

//Update Model Blank Image Preview
$(document).ready(() => {
  $("#update_u_profile_image").change(function () {
    const file = this.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        console.log(event.target.result);
        $("#update_image_preview").attr("src", event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });
});

// Change User Status
$(document).on("change", "#user_status", function () {
  if (this.checked == true) {
    if (this.checked == true) {
      var returnVal = confirm("Are you sure To Active?");
      if (returnVal == true) {
        $(this).prop("checked", true);
        var temp = $(this).closest("tr").attr("id");
        $.ajax({
          url: "update_userMaster.php",
          method: "POST",
          data: {
            msg: "active",
            statusid: temp,
          },
          success: function (data) {},
        });
      }
      if (returnVal == false) {
        $(this).prop("checked", false);
      }
    }
  } else {
    if (this.checked == false) {
      var returnVal = confirm("Are you sure To Inactive?");
      if (returnVal == true) {
        $(this).prop("checked", false);
        var temp = $(this).closest("tr").attr("id");
        $.ajax({
          url: "update_userMaster.php",
          method: "POST",
          data: {
            msg: "inactive",
            statusid: temp,
          },
          success: function (data) {},
        });
      }
      if (returnVal == false) {
        $(this).prop("checked", true);
      }
    }
  }
});

// Insert Data
$(document).ready(function () {
  viewrecord();
  $("#submit").on("click", function () {
    var u_name_val =
      /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,20})+$/;
    var u_name = $("#u_name");

    var u_password_val = new RegExp(
      "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,16})"
    );
    var u_password = $("#u_password");

    var u_email_val =
      /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var u_email = $("#u_email");

    var u_mobile_no_val = /^\d{10}$/;
    var u_mobile_no = $("#u_mobile_no");

    var u_address_val =
      /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
    var u_address = $("#u_address");

    // Input Validations
    if (
      $("#admin").prop("checked") == false &&
      $("#user").prop("checked") == false &&
      $("#active").prop("checked") == false &&
      $("#inactive").prop("checked") == false &&
      $("#u_name").val() == "" &&
      $("#u_password").val() == "" &&
      $("#u_email").val() == "" &&
      $("#u_mobile_no").val() == "" &&
      $("#u_profile_image").val() == "" &&
      $("#user_skill").val() == "" &&
      $("#u_address").val() == "" &&
      $("#u_birthdate").val() == ""
    ) {
      alert("Please Enter All Fields");
      return false;
    } else if (
      $("#admin").prop("checked") == false &&
      $("#user").prop("checked") == false
    ) {
      alert("Please Select User Role ");
    } else if (
      $("#active").prop("checked") == false &&
      $("#inactive").prop("checked") == false
    ) {
      alert("Please Select User Status");
    } else if ($("#u_name").val() == "") {
      alert("Please Enter Username");
    } else if ($("#u_password").val() == "") {
      alert("Please Enter Password");
    } else if ($("#u_email").val() == "") {
      alert("Please Enter Email Addres");
    } else if ($("#u_mobile_no").val() == "") {
      alert("Please Enter Mobile Number");
    } else if ($("#u_profile_image").val() == "") {
      alert("Please Select Profile Image");
    } else if ($("#user_skill").val() == "") {
      alert("Please Select User Skills");
    } else if ($("#u_address").val() == "") {
      alert("Please Enter User Address");
    } else if ($("#u_birthdate").val() == "") {
      alert("Please Select Birthdate");
    } else {
      var formData = new FormData($("#userMasterForm")[0]);
      formData.append("u_profile_image", $("#u_profile_image")[0].files[0]);
      $.ajax({
        type: "POST",
        url: "insert_userMaster.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          viewrecord();
        },
      });
      $("#userMasterModal").modal("hide");
      $("#admin").prop("checked", false);
      $("#user").prop("checked", false);
      $("#active").prop("checked", false);
      $("#inactive").prop("checked", false);
      $("#u_name").val("");
      $("#u_password").val("");
      $("#u_email").val("");
      $("#u_mobile_no").val("");
      $("#u_profile_image").val("");
      $("#user_skill").val("");
      $("#u_address").val("");
      $("#u_birthdate").val("");
    }
  });
});

// View Record
function viewrecord() {
  $.ajax({
    url: "view_userMaster.php",
    type: "POST",
    success: function (data) {
      $("#userMasterRecord").html(data);
    },
  });
}

// Fetch And Update Record
function fetchuser(id) {
  $("#user_id").val(id);
  $.ajax({
    type: "POST",
    url: "update_userMaster.php",
    dataType: "JSON",
    data: {
      id: id,
    },
    success: function (data) {
      var user_master = JSON.parse(JSON.stringify(data));
      if (user_master.roll_id == "1") {
        $("#update_admin").attr("checked", true);
      } else {
        $("#update_user").attr("checked", true);
      }
      if (user_master.user_status == "1") {
        $("#update_active").attr("checked", true);
      } else {
        $("#update_inactive").attr("checked", true);
      }
      $("#update_u_name").val(user_master.u_name);
      $("#update_u_email").val(user_master.u_email);
      $("#update_u_mobile_no").val(user_master.u_mobile_no);
      var path = "images/" + user_master.u_profile_image;
      $("#update_image_preview").attr("src", path);
      $("#update_user_skill").html(user_master.skillData);
      $("#update_u_address").val(user_master.u_address);
      $("#update_u_birthdate").val(user_master.u_birthdate);
    },
    error: function () {
      alert("Error");
    },
  });
  $(document).on("click", ".editUserBtn", function () {
    $("#editUserMasterModal").modal("show");
  });
  $(document).on("click", "#closeEditForm", function () {
    $("#editUserMasterModal").modal("hide");
  });
}

// Update Record
$("#submitEdit").on("click", function (e) {
  e.preventDefault();
  var update_u_name_val =
    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,20})+$/;
  var update_u_name = $("#update_u_name");

  var update_u_password_val = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,16})"
  );
  var update_u_password = $("#update_u_password");

  var update_u_email_val =
    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var update_u_email = $("#update_u_email");

  var update_u_mobile_no_val = /^\d{10}$/;
  var update_u_mobile_no = $("#update_u_mobile_no");

  var update_u_address_val =
    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
  var update_u_address = $("#update_u_address");
  // Input Validations
  if (
    $("#update_admin").prop("checked") == false &&
    $("#update_user").prop("checked") == false &&
    $("#update_active").prop("checked") == false &&
    $("#update_inactive").prop("checked") == false &&
    $("#update_u_name").val() == "" &&
    $("#update_u_email").val() == "" &&
    $("#update_u_mobile_no").val() == "" &&
    $("#update_user_skill").val() == "" &&
    $("#update_u_address").val() == "" &&
    $("#update_u_birthdate").val() == ""
  ) {
    alert("Please Enter All Fields");
    return false;
  } else if (
    $("#update_admin").prop("checked") == false &&
    $("#update_user").prop("checked") == false
  ) {
    alert("Please Select User Role");
  } else if (
    $("#update_active").prop("checked") == false &&
    $("#update_inactive").prop("checked") == false
  ) {
    alert("Please Select User Status");
  } else if ($("#update_u_name").val() == "") {
    alert("Please Enter Username");
  } else if ($("#update_u_email").val() == "") {
    alert("Please Enter Email Addres");
  } else if ($("#update_u_mobile_no").val() == "") {
    alert("Please Enter Mobile Number");
  } else if ($("#update_user_skill").val() == "") {
    alert("Please Select User Skills");
  } else if ($("#update_u_address").val() == "") {
    alert("Please Enter User Address");
  } else if ($("#update_u_birthdate").val() == "") {
    alert("Please Select Birthdate");
  } else {
    var user_id = $("#hidden_user_id").val;
    var formData1 = new FormData($("#editUserMasterForm")[0]);
    formData1.append(
      "u_profile_image",
      $("#update_u_profile_image")[0].files[0]
    );
    $.ajax({
      type: "POST",
      url: "update_userMaster.php",
      data: formData1,
      contentType: false,
      processData: false,
      success: function (data) {
        viewrecord();
      },
      error: function () {
        alert("Error");
      },
    });
    $("#userMasterModal").modal("hide");
    $("#admin").prop("checked", false);
    $("#user").prop("checked", false);
    $("#active").prop("checked", false);
    $("#inactive").prop("checked", false);
    $("#u_name").val("");
    $("#u_password").val("");
    $("#u_email").val("");
    $("#u_mobile_no").val("");
    $("#u_profile_image").val("");
    $("#user_skill").val("");
    $("#u_address").val("");
    $("#u_birthdate").val("");
  }
});

// Delete Record
function deleteuser(id) {
  if (confirm("Are You Sure ?")) {
    $.ajax({
      type: "POST",
      url: "delete_userMaster.php",
      data: {
        delete: 1,
        id: id,
      },
      success: function (data) {
        viewrecord();
      },
    });
  }
}
