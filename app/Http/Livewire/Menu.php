<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;
    public $search = 'Gà';
    public $type_p = 0;
    public $page = 1;
    public $perPage = 9;
    public $lastPage;
    public $message = '';
    // protected $listeners = ['updateType' => 'updatedType'];
    protected $queryString = [
        'type_p' => [],
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'perPage' => ['except' => 0]
    ];
    public function render()
    {

        if ($this->type_p == 0) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage);
        } else {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->where('product_type_id', $this->type_p)->paginate($this->perPage);
        }
        $this->lastPage = $products->lastPage();
        $data = ['types' => ProductType::all(), 'prods' => $products, 'active' => 3];
        return view('livewire.menu', $data);
    }
    public function updatingSearch()
    {
        $this->type_p = 0;
        $this->resetPage();
    }
    public function loadMore()
    {
        //if max page is not reached, load more
        if ($this->page < $this->lastPage) {
            sleep(1);
            $this->perPage += 6;
            $this->message = '';
        } else {
            $this->message = 'Không còn sản phẩm nào để hiển thị';
        }
    }
    public function updateType($type)
    {
        $this->message = '';
        $this->search = '';
        $this->type_p = $type;
        $this->resetPage();

    }
}
