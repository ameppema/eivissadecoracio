<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Slide;

class SlideSeeder extends Seeder
{
    private $columns = ['title'=>'titulo','descripction'=>'descripcion','image'=>'imagen','image_mobile'=>'imagen_movil','locale'=>'locale'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([$this->columns['title'] => 'Lideres en Construcción',$this->columns['descripction']=>'Con mas de 40 años en la construcción, somos lideres en esta industria!', $this->columns['image']=>'slide/slide01_lg.jpg',$this->columns['image_mobile']=>'slide/slide01_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Ingeniería y Contratación.',$this->columns['descripction']=>'Con mas de 40 años en la construcción somos lideres', $this->columns['image']=>'slide/slide03_lg.jpg',$this->columns['image_mobile']=>'slide/slide02_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Servicios de construcción.',$this->columns['descripction']=>'Después de una cuidadosa planificación y diseño, nos ensuciamos las manos.', $this->columns['image']=>'slide/slide03_lg.jpg',$this->columns['image_mobile']=>'slide/slide03_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Gestión de proyectos.',$this->columns['descripction']=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. ESPAÑOL Lorem ipsum, dolor sit amet consectetur rebates.', $this->columns['image']=>'slide/slide04_lg.jpg',$this->columns['image_mobile']=>'slide/slide04_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Estructuras de madera',$this->columns['descripction']=>'El encuadre, en la construcción, es la unión de piezas para dar soporte y forma a la estructura.', $this->columns['image']=>'slide/slide05_lg.jpg',$this->columns['image_mobile']=>'slide/slide05_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Constructores residenciales.',$this->columns['descripction']=>'Ofrecemos servicios completos de diseño y remodelación de viviendas.', $this->columns['image']=>'slide/slide06_lg.jpg',$this->columns['image_mobile']=>'slide/slide06_xs.jpg',$this->columns['locale']=>'es']);
        Slide::create([$this->columns['title'] => 'Diseños exteriores',$this->columns['descripction']=>'	Si está buscando mejorar su atractivo exterior, nada tiene un impacto más grande que renovar el exterior de su casa.', $this->columns['image']=>'slide/slide07_lg.jpg',$this->columns['image_mobile']=>'slide/slide07_xs.jpg',$this->columns['locale']=>'es']);
    }
}
