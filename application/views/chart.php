<script src="<?php  echo base_url(); ?>assets/highcart/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php  echo base_url(); ?>assets/highcart/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
 var chart1; // globally available
 $(document).ready(function() {
  chart1 = new Highcharts.Chart({
   chart: {
    renderTo: 'grafik',
    type: 'column'
  },   
  title: {
    text: 'Grafik Pengerjaan Tugas Karyawan PTPN 7  '
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  xAxis: {
    categories: [<?php 

   foreach ($charts as $data) {
    echo "' $data->bulan ',\n";
  }?>
     ]
   },
   yAxis: {
    title: {
     text: 'Jumlah '
   },
   plotLines: [{
    value: 0,
    width: 1,
    color: '#808080'
  }]
},
tooltip: {
  formatter: function() {
    return '<b>'+ this.series.name +'</b><br/>'+
    this.x +': '+ this.y;
  }
},

series: [{
  name: 'Selesai',
  data:  [<?php 

   foreach ($charts as $data) {
    echo "".$data->success. ",\n";
  }?> ]
 }, {
  name: 'Belum selesai',
  data: [<?php 

   foreach ($charts as $data) {
    echo "" .$data->work. ",\n";
  }?>
  ]
}]


});
}); 
</script>

