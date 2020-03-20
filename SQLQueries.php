/*


    // $result = DB::table('products')
      // ->join('report', function($join) use ($date)
      // {
      //  $join->on('products.id', '=', 'report.product_id')
      //  ->where('created_at', '=', $date);
      // })
      // ->join('report_views', 'products.id', '=', 'report_views.product_id')
      // ->select('products.*',DB::raw('SUM(report.ammount) As ammount'), 'report.purchased', 'report_views.total_views')
      // ->get();
      // return Product::with('reportViews')->with('report')->find($id);
      // dd(Report::with('product.reportView')->where('created_at', '=', $date)->get());


SELECT products.*, sum(report.ammount), sum(report_views.total_views) from test.products 
join test.report on products.id = report.product_id
join test.report_views on products.id = report_views.product_id 
group by products.id


SELECT products.*, sum(report.purchased), sum(report_views.total_views) from test.report 
where report.created_at = '2020-03-10 02:00:00'
join test.products on products.id = report.product_id
join test.report_views on products.id = report_views.product_id 
group by products.id


SELECT products.*, sum(report.purchased) from (select * from test.report where report.created_at = '2020-03-10 02:00:00') as report
join test.products on products.id = report.product_id
group by products.id




worked
SELECT products.id as id,
       products.title as title,
       combinedreport.purchased,
	   sum(report_views.total_views)
       from test.products
           join 
               (select report.product_id, sum(report.purchased) as purchased
                   from test.report
                   where DATE(report.created_at) = '2020-03-10'
                   group by report.product_id)
			as combinedreport on combinedreport.product_id = products.id
       left join test.report_views on products.id = report_views.product_id
       where DATE(report_views.created_at) = '2020-03-10'
       group by products.id





       SELECT products.id as id,
       products.title as title,
       combinedreport.purchased_amount,
	   sum(report_views.total_views) as total_views
       from test.products
           join 
               (select report.product_id, sum(report.purchased * report.ammount) as purchased_amount
                   from test.report
                   where DATE(report.created_at) = '2020-03-10'
                   group by report.product_id)
			as combinedreport on combinedreport.product_id = products.id
       left join test.report_views on products.id = report_views.product_id
       where DATE(report_views.created_at) = '2020-03-10'
       group by products.id










SELECT products.id as id,
       products.title as title,
       combined_report.purchased_amount,
	   combined_report_views.total_views
       from test.products
           left join 
               (select report.product_id, sum(report.purchased * report.ammount) as purchased_amount
                   from test.report
                   where DATE(report.created_at) = '2020-03-09'
                   group by report.product_id)
			as combined_report on combined_report.product_id = products.id
          left join 
              (select report_views.product_id, sum(report_views.total_views) as total_views
			      from test.report_views
                  where DATE(report_views.created_at) = '2020-03-09'
                  group by report_views.product_id)
              as combined_report_views on combined_report_views.product_id = products.id
       group by products.id



       SELECT products.id as id,
       products.title as title,
       combined_report.purchased_amount,
	   combined_report_views.total_views
       from test.products
           left join 
               (select report.product_id, sum(report.purchased * report.ammount) as purchased_amount
                   from test.report
                   where DATE(report.created_at) = '2020-03-09'
                   group by report.product_id)
			as combined_report on combined_report.product_id = products.id
          left join 
              (select report_views.product_id, sum(report_views.total_views) as total_views
			      from test.report_views
                  where DATE(report_views.created_at) = '2020-03-09'
                  group by report_views.product_id)
              as combined_report_views on combined_report_views.product_id = products.id
       group by products.id
       where combined_report.purchased_amount is not null or combined_report_views.total_views is not null;'


SELECT products.id as id,
       products.title as title,
       concat(round(( combined_report.purchased/combined_report_views.total_views * 100 ),2),'%') AS percentage
       from test.products
           left join 
               (select report.product_id, sum(report.purchased) as purchased
                   from test.report
                   group by report.product_id)
      as combined_report on combined_report.product_id = products.id
          left join 
              (select report_views.product_id, sum(report_views.total_views) as total_views
            from test.report_views
                  group by report_views.product_id)
              as combined_report_views on combined_report_views.product_id = products.id;

*/