//knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      //radio button checked
        $(function(){
          $('.hiddenfld').hide();
            $("input[name=pymntmod]:radio").click(function () {
                var pymntmd = $("input[name='pymntmod']:checked").val();
                if(pymntmd==2){
                  $('.hiddenfld').show();
                }else{
                  $('.hiddenfld').hide();
                }
              });

            
              $( "#stsord" ).change(function() {
                 var stsval = $(this).val();
                 if(stsval == 3 ){
                     $('.rejectionreason').show();
                 }else{
                     $('.rejectionreason').hide();
                 }
              });

                $( "#cstprce" ).keyup(function() {
                    var cstprce = $(this).val();
                    var cchrges = $('#cchrges').val();
                    if(parseInt(cchrges) && cchrges !="NaN"){
                      var total = parseInt(cstprce) + parseInt(cchrges);
                      alert(total);
                    }else{
                      var total = parseInt(cstprce);
                     }
                    $('#totalamnt').val(total);
                }); 

                $( "#cchrges" ).keyup(function() {
                    var cstprce = $('#cstprce').val();
                    var cchrges = $(this).val();
                    var total = parseInt(cstprce) + parseInt(cchrges);
                    $('#totalamnt').val(total);
                }); 
          });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});
 /*--------------------tinymce editor----------------------*/
       tinymce.init({
    selector: "#tinymce_textarea",
    menubar: "table tools",
    theme: "modern",
    height: '400px',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools jbimages"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | print preview media | forecolor backcolor emoticons",
    //toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],
	relative_urls : false
        
    });
///multi checked checkbox js start
  var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("multicheckbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}

///multi checked checkbox js end

