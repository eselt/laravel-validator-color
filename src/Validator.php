<?php

namespace Tylercd100\Validator\Color;

class Validator
{

    protected $colors = ['aliceblue','antiquewhite','aqua','aquamarine','azure','beige','bisque','black','blanchedalmond','blue','blueviolet','brown','burlywood','cadetblue','chartreuse','chocolate','coral','cornflowerblue','cornsilk','crimson','cyan','darkblue','darkcyan','darkgoldenrod','darkgray','darkgrey','darkgreen','darkkhaki','darkmagenta','darkolivegreen','darkorange','darkorchid','darkred','darksalmon','darkseagreen','darkslateblue','darkslategray','darkslategrey','darkturquoise','darkviolet','deeppink','deepskyblue','dimgray','dimgrey','dodgerblue','firebrick','floralwhite','forestgreen','fuchsia','gainsboro','ghostwhite','gold','goldenrod','gray','grey','green','greenyellow','honeydew','hotpink','indianred','indigo','ivory','khaki','lavender','lavenderblush','lawngreen','lemonchiffon','lightblue','lightcoral','lightcyan','lightgoldenrodyellow','lightgray','lightgrey','lightgreen','lightpink','lightsalmon','lightseagreen','lightskyblue','lightslategray','lightslategrey','lightsteelblue','lightyellow','lime','limegreen','linen','magenta','maroon','mediumaquamarine','mediumblue','mediumorchid','mediumpurple','mediumseagreen','mediumslateblue','mediumspringgreen','mediumturquoise','mediumvioletred','midnightblue','mintcream','mistyrose','moccasin','navajowhite','navy','oldlace','olive','olivedrab','orange','orangered','orchid','palegoldenrod','palegreen','paleturquoise','palevioletred','papayawhip','peachpuff','peru','pink','plum','powderblue','purple','rebeccapurple','red','rosybrown','royalblue','saddlebrown','salmon','sandybrown','seagreen','seashell','sienna','silver','skyblue','slateblue','slategray','slategrey','snow','springgreen','steelblue','tan','teal','thistle','tomato','turquoise','violet','wheat','white','whitesmoke','yellow','yellowgreen'];

    public function isColor($color): bool
    {
        return $this->isColorAsKeyword($color)
            || $this->isColorAsHex($color)
            || $this->isColorAsRGB($color)
            || $this->isColorAsRGBA($color);
    }

    public function isColorAsHex($color): bool
    {
        return $this->isColorAsLongHex($color) || $this->isColorAsShortHex($color);
    }

    public function isColorAsRGB($color): bool
    {
        preg_match('/^(rgb)\(([01]?\d\d?|2[0-4]\d|25[0-5])(\W+)([01]?\d\d?|2[0-4]\d|25[0-5])\W+(([01]?\d\d?|2[0-4]\d|25[0-5])\))$/i',$color,$m);
        return count($m) > 0;
    }

    public function isColorAsRGBA($color): bool
    {
        preg_match('/^(rgba)\(([01]?\d\d?|2[0-4]\d|25[0-5])\W+([01]?\d\d?|2[0-4]\d|25[0-5])\W+([01]?\d\d?|2[0-4]\d|25[0-5])\)?\W+([01](\.\d+)?)\)$/i',$color,$m);
        return count($m) > 0;
    }

    public function isColorAsShortHex($color): bool
    {
        preg_match('/^#(\d|a|b|c|d|e|f){3}$/i', $color, $m);
        return count($m) > 0;
    }

    public function isColorAsLongHex($color): bool
    {
        preg_match('/^#(\d|a|b|c|d|e|f){6}$/i', $color, $m);
        return count($m) > 0;
    }

    public function isColorAsKeyword($color): bool
    {
        return in_array($color, $this->colors);
    }
}
