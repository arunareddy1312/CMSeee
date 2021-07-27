var serviceModalInEditMode = false;
var idBeingEdited = null;
//start an IIFE scope


//document ready function
$(() => {
  loadData();
});

function loadData() {
  $.get('../../index.php?controller=services&action=fetchServices').done(data => {
    let responseData = JSON.parse(data);
    let servicesHTML = createPostsHTMLAdmin(responseData);
    $('#sericeTable').html(servicesHTML);
  }).fail(err => {
  });

}

function createPostsHTMLAdmin(services) {
  returnVal = services.reduce((accumulator, currentServices, index) => {
    return accumulator + `     
        <tr>
        <td>
        `+ currentServices.id + `
        </td>
        <td>
         `+ currentServices.title + `
        </td>
        <td>
        `+ currentServices.text + `
        </td>
        <td>
        `+ currentServices.picture + `
        </td>
        <td>
          <a class="btn btn-primary" onclick="openEditService( `+ currentServices.id + `)">Edit</a>
          <a class="btn btn-primary" onclick="openDeleteService( `+ currentServices.id + `)">Delete</a>
        </td>
      </tr>    
     `;

  }, '')

  return returnVal
}

function openEditService(id) {
  serviceModalInEditMode = true;
  idBeingEdited = id;
  $.post('../../index.php?controller=services&action=fetchServicesByID',
    {
      "id": id
    }).done(data => {
      debugger;
      let responseData = JSON.parse(data);
      debugger;
      $('#serviceHeader').html('Edit Service');
      $('#service-title').val(responseData[0].title);
      $('#service-text').val(responseData[0].text);
      $("#inputGroupSelect01 option:contains(" + responseData[0].picture + ")").attr('selected', 'selected');
      $('#add').modal();
    });

  console.log(id);
}

function openDeleteService(id) {
  debugger;
  serviceModalInEditMode = false;
  $('#deleteService').modal('show');
}

function openAddService() {
  // in case the add service button is clicked
  //then in that case set the serviceModalInEditMode = true 
  //then use this to perform the submit action
  serviceModalInEditMode = false;
  $('#add').modal();
}

function addservices() {
  if (serviceModalInEditMode) {
    //perform the post call to update the data
    $.post('../../index.php?controller=services&action=updateServicesToDb',
      {
        "id": idBeingEdited,
        "title": $('#service-title').val(),
        "text": $('#service-text').val(),
        "icon": $("#inputGroupSelect01 option:selected").text()
      }).done(function (d) {
        alert("Service updated successfully");
        loadData();
      });
  } else {
    //performt the post call to add the data
    $.post('../../index.php?controller=services&action=addServicesToDb',
      {
        "title": $('#service-title').val(),
        "text": $('#service-text').val(),
        "icon": $("#inputGroupSelect01 option:selected").text()
      }).done(function (d) {
        alert("Service added successfully");
        loadData();
      });
  }

  return false;
}