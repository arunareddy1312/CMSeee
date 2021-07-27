$(() => {
  $.get('../index.php?controller=services&action=fetchServices').done(data => {
    let responseData = JSON.parse(data);
    let servicesHTML = createPostsHTML(responseData);
    $('#currentServices').html(servicesHTML);
  }).fail(err => {
  });


  function createPostsHTML(services) {
    let classArray = ["col-lg-4 col-md-6", "col-lg-4 col-md-6 mt-4 mt-md-0", "col-lg-4 col-md-6 mt-4 mt-lg-0", "col-lg-4 col-md-6 mt-4", "col-lg-4 col-md-6 mt-4", "col-lg-4 col-md-6 mt-4"];
    let iconColor = ["#ff689b", "#e9bf06", "#3fcdc7", "#41cf2e", "#d6ff22", "#4680ff"];
    returnVal = services.reduce((accumulator, currentServices, index) => {


      return accumulator + `
            <div class="`+ classArray[index] + `">
            <div class="icon-box">
              <div class="icon"><i class="`+ currentServices.picture + `" style="color: ` + iconColor[index] + `;"></i></div>
              <h4 class="title"><a href="">`+ currentServices.title + `</a></h4>
              <p class="description">`+ currentServices.text + `</p>
            </div>
          </div>
      `;

    }, '')

    return returnVal
  }

});
