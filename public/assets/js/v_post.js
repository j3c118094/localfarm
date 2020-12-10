$('#resep').DataTable( {
    paging: true,
    scrollY: 400
} );

$('#artikel').DataTable( {
    paging: true,
    scrollY: 400
} );

$('#response').DataTable( {
    
} );

$('.dataTables_filter input[type="search"]').
  attr('placeholder','Cari...').
  css({
      'width':'75%','display':'inline-block'
  }
);

/* $('#table1').DataTable( {
    paging: true,
    scrollY: 400
} ); */