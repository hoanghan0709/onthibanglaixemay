<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// vis du co 1 bang user vs 1 bang la bang diem cua user do nha quan he voi nhau dua tren khoa id cua user
// thi m import 2 model do vo day xong xuong duoi su dung no return ve  // test thử dc ko  \
// k can khoa ngoai van dcar
// folder ni m tesst dung k.uk ko phai.cai kia kia`
class test extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // nayf nef // là tùy biến json à uk kiểu kiểu v
    }
}
