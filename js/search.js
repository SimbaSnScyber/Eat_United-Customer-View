$("#search").on("keyup", function() {
    var key = this.value;
     $(".strip").each(function() {
        var $this = $(this);
        $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
     });
 });