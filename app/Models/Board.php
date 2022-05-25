<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class Board extends Model
{
    protected $table = 'board';

    //##################################################################################################################
    //##
    //## >> Method  : Relations
    //##
    //##################################################################################################################


    //##################################################################################################################
    //##
    //## >> Method  : Converter
    //##
    //##################################################################################################################
    /**
     * 데이터 변환
     * -----------------------------------------------------------------------------------------------------------------
     */

    //##################################################################################################################
    //##
    //## >> Method  : Base Function
    //##
    //##################################################################################################################

    /**
     * Data List
     * @return  Collection
     * -----------------------------------------------------------------------------------------------------------------
     */
    function dataList()
    {
        return Board::orderBy('id', 'desc')->get();
    }


    //##################################################################################################################
    //##
    //## >> Method  : Scope Search
    //##
    //##################################################################################################################
}