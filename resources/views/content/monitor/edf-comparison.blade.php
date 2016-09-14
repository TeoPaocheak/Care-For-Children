<section id="widget-grid" class="">
    <?php
    $i = 0;
    $edf = [];
    ?>
    @foreach($rows as $row)
    <?php
    $edf[$i] = [];
    ?>
    <div class="col-sm-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{$table->TableNameEN}}
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">
                    <div class="col-sm-6">
                        @foreach($colHeaders as $header)
                        <div class="form-group">
                            <label for="field" style="font-weight: bold;">{{$header->EntityDefinedFieldListName}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-6">
                        @foreach($row as $col)
                        <?php
                        $edf[$i][] = $col;
                        ?>
                        <div class="form-group">
                            <label for="field">:{{$col}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $i++;
    ?>
    @endforeach
    <?php
        $noOfField = count($edf[0]);
    ?>
    <div class="col-sm-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Variance
            </div>
            <div class="panel-body">
                <?php
                
                ?>
            </div>
        </div>
    </div>
</section>