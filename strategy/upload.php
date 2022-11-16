<?php

//interfaces
interface Compressor {
    function compress(string $fileName);
}
interface Filter {
    function apply(string $fileName);
}


//classes
class ImageStorage {
    public function store(string $fileName, Compressor $compressor, Filter $filter) {
        $compressor->compress($fileName);
        $filter->apply($fileName);
    }
}
class JpegCompressor implements  Compressor {
    function compress(string $fileName) {
        echo "Compressing using JPEG \n";
    }
}
class PngCompressor implements Compressor {
    function compress(string $fileName) {
        echo "Compressing using PNG \n";
    }
}
class BlackAndWhiteFilter implements Filter {

    function apply(string $fileName) {
        echo "applying black and white filter \n";
    }
}



//client
$imageStorage = new ImageStorage();
$imageStorage->store('filenameA', new JpegCompressor(), new BlackAndWhiteFilter());
$imageStorage->store('filenameB', new PngCompressor(), new BlackAndWhiteFilter());
