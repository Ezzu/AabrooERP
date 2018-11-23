<table style="display: none;">
    <tbody id="line_item-container" >
    <tr id="line_item-######">
        <td >
            <div class="form-group" style="margin-bottom: 0px !important;">
                <div class="form-group" style="margin-bottom: 0px !important;">
                
                    {!! Form::text('line_items[title][######]',  old('passing_year'), ['id' => 'line_item-title_id-######','class' => 'form-control', 'required' => 'true']) !!}
                    
                </div>
            </div>
        </td>
        <td>
            <div class="form-group" style="margin-bottom: 0px !important;" >

                {!! Form::number('line_items[passing_year][######]',  old('passing_year'), ['id' => 'line_item-passing_year_id-######','class' => 'form-control', 'required' => 'true']) !!}

            </div>
        </td>
        <td>
            <div class="form-group" style="margin-bottom: 0px !important;" >

                {!! Form::select('line_items[division][######]', array() + Config::get('admin.division_array'), old('division'), ['id' => 'line_item-division_id-######','class' => 'form-control', 'required' => 'true']) !!}

            </div>
        </td>
        <td>
            <div class="form-group" style="margin-bottom: 0px !important;" >

                {!! Form::text('line_items[institution][######]',  old('institution'), ['id' => 'line_item-institution_id-######','class' => 'form-control', 'required' => 'true']) !!}

            </div>
        </td>

        <td><button id="line_item-del_btn-######" onclick="FormControls.destroyLineItem('######');" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
    </tr>
    </tbody>
</table>