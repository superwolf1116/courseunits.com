<div class="filter-courses-header">
    <div class="container">
        <h4>Filter By</h4>
        <div class="filter-courses">
            <div class="filter-courses-select">
                <span>
                    <?php 
                    $topics = array();
                        foreach($globalSubSubCategories as $key => $value){
                            foreach($value as $key => $value1){
                                $topics[$value1->id] = $value1->name;
                            }
                        }
                    ?>
                    {{Form::select('topic', $topics,null, ['class' => 'form-control','placeholder' => 'Topic','onchange'=>"applyfilter()"])}}
                </span>
            </div>

            <div class="filter-courses-select">
                <span>
                    <?php global $level; ?>
                    {{Form::select('level', $level,null, ['class' => 'form-control','placeholder' => 'Level','onchange'=>"applyfilter()"])}}
                </span>
            </div>


            <div class="filter-courses-select">
                <span>
                    <?php global $package_price; ?>
                    {{Form::select('price', $package_price,null, ['class' => 'form-control','placeholder' => 'Price','onchange'=>"applyfilter()"])}}
                </span>
            </div>

            <div class="filter-courses-select">
                <span>
                    <?php global $duration; ?>
                    {{Form::select('duration', $duration,null, ['class' => 'form-control','placeholder' => 'Duration','onchange'=>"applyfilter()"])}}
                </span>
            </div>
            <div class="filter-courses-select filter-courses-select-last">
                <span>
                    <?php global $rating; ?>
                    {{Form::select('rating', $rating,null, ['class' => 'form-control','placeholder' => 'Rating','onchange'=>"applyfilter()"])}}
                </span>
            </div>
        </div>
    </div>
</div>