<?php

namespace App\Console\Commands;

use App\Http\Traits\ImageStorage;
use App\Http\Traits\ProductTrait;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use TheSeer\Tokenizer\Exception;

class ScanImages extends Command
{
    use ProductTrait, ImageStorage;

    private $productModel;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan Images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Product $productModel)
    {
        parent::__construct();
        $this->productModel = $productModel;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $mimes = ['png', 'jpg', 'jpeg', 'webp'];
            $files = Storage::disk('local')->files('public/images');
    
            foreach($files as $file) {
                $fullPath = Storage::disk('local')->path($file);
                $fileContent = explode('/', $file);
                $fileName = explode('.', $fileContent[2]);
                $code = $fileName[0];
                $mime = strtolower($fileName[1]);
    
                if(in_array($mime, $mimes)) {
                    if($product = $this->getProductByCode($code)) {
                        if($product->main_image)    $this->deleteImage($product->main_image);
                        $path = Storage::putFile('products', $fullPath);
                        $product->update([
                            'main_image' => $path
                        ]);
                        unlink($fullPath);
                    }
                    else {
                        throw new Exception("No products match this code ($code)");
                    }
                }
                else {
                    throw new Exception("Image $code should be of types (" . implode(', ', $mimes) . ').');
                }
            }

            $this->info('Images scanned successfully');
            return self::SUCCESS;
        }
        catch(Exception $e) {
            $this->info($e);
            return self::FAILURE;
        }
    }
}
