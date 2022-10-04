//select2 tag
$(".tags-choose").select2({
    tags: true,
    tokenSeparators: [',']
})
//select2 category
$(".select2-category").select2({
    placeholder: "Chọn danh mục",
    allowClear: true 
})
//file manager
$(document).ready(function(){
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '../../laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {
          lfm({type: 'image', prefix: '../../laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };
    // summernote-editor
    $('#summernote-editor').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['popovers', ['lfm']]
        
      ],
      height:420,
      placeholder:' Nhập thông tin sản phẩm',
      buttons: {
        lfm: LFMButton
      }
    })
  
  });



