<?php

declare(strict_types=1);

namespace App\Repositories\Product;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Models\ReportView;
use App\Models\Product;


class ProductRepository implements ProductRepositoryInterface
{


    public function all()
    {
        return Product::all();
    }

    public function add($data)
    {
        return Product::create($data);
    }

    public function getById($id)
    {
        return Product::find($id);
    }

    public function update($request, $id)
    {
        return Product::where('id',$id)->update($request);
    }

    public function del($id)
    {
        return Product::destroy($id);
    }

    public function getByDate($date)
    {
  
      $query = 'SELECT products.id as id,
    		products.title as title,
    		combined_report.purchased_amount,
    		combined_report_views.total_views
    		from test.products
               left join 
                   (select report.product_id, sum(report.purchased * report.ammount) as purchased_amount
                       from test.report
                       where DATE(report.created_at) = "'.$date.'"
                       group by report.product_id)
    			as combined_report on combined_report.product_id = products.id
              left join 
                  (select report_views.product_id, sum(report_views.total_views) as total_views
    			      from test.report_views
                      where DATE(report_views.created_at) = "'.$date.'"
                      group by report_views.product_id)
                  as combined_report_views on combined_report_views.product_id = products.id
    		where combined_report.purchased_amount is not null or combined_report_views.total_views is not null;';
      return DB::select($query) ;

    }

    public function percentage()
    {
        $query = 'SELECT products.id as id,
       products.title as title,
       concat(round(( combined_report.purchased/combined_report_views.total_views * 100 ),2),"%") AS percentage
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
              as combined_report_views on combined_report_views.product_id = products.id;';
      return DB::select($query) ;

    }
    

}
