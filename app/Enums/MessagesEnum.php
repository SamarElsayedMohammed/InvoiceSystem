<?php

namespace App\Enums;

enum MessagesEnum: string
{
    case CodeError = 'somthing get wrong please try later';
    case CreateItem = 'Create Item Successfuly';
    case DeletItem = 'Delete Item Successfuly';
    case UpdatetItem = 'Update Item Successfuly';
    case NotFoundItem = 'Item not found';

}