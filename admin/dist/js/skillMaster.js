// Skill Master DataTable
$(function () {
  $("#skillMasterTable").DataTable({
    paging: true,
    lengthChange: false,
    lengthMenu: [5, 10, 20, 50, 100],
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    pageLength: 10,
  });
});

// Insert Data
$(document).ready(function () {
  viewrecord();
  $("#submit").click(function () {
    var skill_name = $("#skill_name").val();
    if (skill_name == "") {
      alert("Enter Skill Name");
      return false;
    }
    $.ajax({
      type: "POST",
      url: "insert_skillMaster.php",
      data: {
        skill_name: skill_name,
      },
      success: function (data) {
        $("#skill_name").val("");
        viewrecord();
      },
    });
  });
});

// View Record
function viewrecord() {
  $.ajax({
    url: "view_skillMaster.php",
    type: "POST",
    success: function (data) {
      $("#skillMasterRecord").html(data);
    },
  });
}

// Fetch And Update Data
function fetchskill(id) {
  $("#skill_id").val(id);
  $.ajax({
    type: "POST",
    url: "update_skillMaster.php",
    dataType: "json",
    data: {
      id: id,
    },
    success: function (data) {
      var user_skill = JSON.parse(JSON.stringify(data));
      $("#update_skill_name").val(user_skill.skill_name);
    },
    error: function () {
      alert("error");
    },
  });
  $("#editSkillMaster").modal("show");
}

// Update Data
function updatedata() {
  var skill_id = $("#skill_id").val();
  var skill_name = $("#update_skill_name").val();
  if (skill_name == "") {
    alert("Enter Skill Name");
  } else {
    $.ajax({
      url: "update_skillMaster.php",
      type: "POST",
      data: {
        skill_id: skill_id,
        skill_name: skill_name,
      },
      success: function (data) {
        viewrecord();
      },
    });
    $("#editSkillMaster").modal("hide");
  }
}

// Delete Record
function deleteskill(id) {
  if (confirm("Are You Sure ?")) {
    $.ajax({
      type: "POST",
      url: "delete_skillMaster.php",
      data: {
        delete: 1,
        id: id,
      },
      success: function (data) {
        viewrecord();
      },
      error: function () {
        alert("Record Not Deleted!");
      },
    });
  }
}
