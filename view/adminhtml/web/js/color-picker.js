/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

define(["jquery", "jquery/colorpicker/js/colorpicker", "domReady!"], function ($) {
    return function (config, element) {
        var $el = $(element);
        $el.css("backgroundColor", config.color);
        $el.ColorPicker({
            color: config.color,
            onChange: function (hsb, hex, rgb) {
                $el.css("backgroundColor", "#" + hex).val("#" + hex);
            }
        });
    }
})