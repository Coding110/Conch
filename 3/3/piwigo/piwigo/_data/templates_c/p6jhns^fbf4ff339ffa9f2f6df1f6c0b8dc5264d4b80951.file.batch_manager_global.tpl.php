<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:19
         compiled from "./admin/themes/default/template/batch_manager_global.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15881477365466f2fb599067-93136373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbf4ff339ffa9f2f6df1f6c0b8dc5264d4b80951' => 
    array (
      0 => './admin/themes/default/template/batch_manager_global.tpl',
      1 => 1387903835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15881477365466f2fb599067-93136373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tag' => 0,
    'nb_thumbs_page' => 0,
    'nb_thumbs_set' => 0,
    'all_elements' => 0,
    'dimensions' => 0,
    'F_ACTION' => 0,
    'START' => 0,
    'filter' => 0,
    'prefilters' => 0,
    'prefilter' => 0,
    'category_full_name_options' => 0,
    'filter_category_selected' => 0,
    'filter_tags' => 0,
    'filter_level_options' => 0,
    'filter_level_options_selected' => 0,
    'thumbnails' => 0,
    'selection' => 0,
    'thumb_params' => 0,
    'thumbnail' => 0,
    'isSelected' => 0,
    'navbar' => 0,
    'U_DISPLAY' => 0,
    'dissociate_options' => 0,
    'DEL_TAG_SELECTION' => 0,
    'IN_CADDIE' => 0,
    'element_set_global_plugins_actions' => 0,
    'action' => 0,
    'authorDefaultValue' => 0,
    'titleDefaultValue' => 0,
    'DATE_CREATION_DAY' => 0,
    'month_list' => 0,
    'DATE_CREATION_MONTH' => 0,
    'DATE_CREATION_YEAR' => 0,
    'level_options' => 0,
    'level_options_selected' => 0,
    'generate_derivatives_types' => 0,
    'type' => 0,
    'disp' => 0,
    'del_derivatives_types' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2fb8a03c8_57127918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2fb8a03c8_57127918')) {function content_5466f2fb8a03c8_57127918($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('include/tag_selection.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/datepicker.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/colorbox.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/add_album.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'common','load'=>'footer','path'=>'admin/themes/default/js/common.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.slider','require'=>'jquery.ui','load'=>'footer','path'=>'themes/default/js/ui/minified/jquery.ui.slider.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/ui/theme/jquery.ui.slider.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

  pwg_initialization_datepicker("#date_creation_day", "#date_creation_month", "#date_creation_year", "#date_creation_linked_date", "#date_creation_action_set");
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

/* Shift-click: select all photos between the click and the shift+click */
jQuery(document).ready(function() {
  var last_clicked=0;
  var last_clickedstatus=true;
  jQuery.fn.enableShiftClick = function() {
    var inputs = [];
    var count=0;
    this.find('input[type=checkbox]').each(function() {
      var pos=count;
      inputs[count++]=this;
      $(this).bind("shclick", function (dummy,event) {
        if (event.shiftKey) {
          var first = last_clicked;
          var last = pos;
          if (first > last) {
            first=pos;
            last=last_clicked;
          }

          for (var i=first; i<=last;i++) {
            input = $(inputs[i]);
            $(input).prop('checked', last_clickedstatus);
            if (last_clickedstatus)
            {
              $(input).siblings("span.wrap2").addClass("thumbSelected");
            }
            else
            {
              $(input).siblings("span.wrap2").removeClass("thumbSelected");
            }
          }
        }
        else {
          last_clicked = pos;
          last_clickedstatus = this.checked;
        }
        return true;
      });
      $(this).click(function(event) { $(this).triggerHandler("shclick",event)});
    });
  }
	$('ul.thumbnails').enableShiftClick();
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/plugins/jquery.tokeninput.css'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.tokeninput','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.tokeninput.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.progressBar','load'=>'footer','path'=>'themes/default/js/plugins/jquery.progressbar.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','load'=>'footer','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.tokeninput')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tokeninput'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
  jQuery("a.preview-box").colorbox();
  
	var tag_src = [<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tags']['last'] = $_smarty_tpl->tpl_vars['tag']->last;
?>{name:"<?php echo strtr($_smarty_tpl->tpl_vars['tag']->value['name'], array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
",id:"<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['tags']['last']){?>,<?php }?><?php } ?>];
  jQuery("#tags").tokenInput(
    tag_src,
    {
      hintText: '<?php echo l10n('Type in a search term');?>
',
      noResultsText: '<?php echo l10n('No results');?>
',
      searchingText: '<?php echo l10n('Searching...');?>
',
      newText: ' (<?php echo l10n('new');?>
)',
      animateDropdown: false,
      preventDuplicates: true,
      allowFreeTagging: true
    }
  );
	
  jQuery("#tagsFilter").tokenInput(
    tag_src,
    {
      hintText: '<?php echo l10n('Type in a search term');?>
',
      noResultsText: '<?php echo l10n('No results');?>
',
      searchingText: '<?php echo l10n('Searching...');?>
',
      animateDropdown: false,
      preventDuplicates: true,
      allowFreeTagging: false
    }
  );

});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tokeninput'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

var nb_thumbs_page = <?php echo $_smarty_tpl->tpl_vars['nb_thumbs_page']->value;?>
;
var nb_thumbs_set = <?php echo $_smarty_tpl->tpl_vars['nb_thumbs_set']->value;?>
;
var are_you_sure = "<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
";
var applyOnDetails_pattern = "<?php echo l10n('on the %d selected photos');?>
";
var all_elements = [<?php if (!empty($_smarty_tpl->tpl_vars['all_elements']->value)){?><?php echo implode(',',$_smarty_tpl->tpl_vars['all_elements']->value);?>
<?php }?>];
var derivatives = {
	elements: null,
	done: 0,
	total: 0,
	
	finished: function() {
		return derivatives.done == derivatives.total && derivatives.elements && derivatives.elements.length==0;
	}
};

var selectedMessage_pattern = "<?php echo l10n('%d of %d photos selected');?>
";
var selectedMessage_none = "<?php echo l10n('No photo selected, %d photos in current set');?>
";
var selectedMessage_all = "<?php echo l10n('All %d photos are selected');?>
";

var width_str = '<?php echo l10n('Width');?>
';
var height_str = '<?php echo l10n('Height');?>
';
var max_width_str = '<?php echo l10n('Maximum width');?>
';
var max_height_str = '<?php echo l10n('Maximum height');?>
';


function progress(success) {
  jQuery('#progressBar').progressBar(derivatives.done, {
    max: derivatives.total,
    textFormat: 'fraction',
    boxImage: 'themes/default/images/progressbar.gif',
    barImage: 'themes/default/images/progressbg_orange.gif'
  });
	if (success !== undefined) {
		var type = success ? 'regenerateSuccess': 'regenerateError',
			s = jQuery('[name="'+type+'"]').val();
		jQuery('[name="'+type+'"]').val(++s);
	}

	if (derivatives.finished()) {
		jQuery('#applyAction').click();
	}
}

$(document).ready(function() {
  function checkPermitAction() {
    var nbSelected = 0;
    if ($("input[name=setSelected]").is(':checked')) {
      nbSelected = nb_thumbs_set;
    }
    else {
      nbSelected = $(".thumbnails input[type=checkbox]").filter(':checked').length;
    }

    if (nbSelected == 0) {
      $("#permitAction").hide();
      $("#forbidAction").show();
    }
    else {
      $("#permitAction").show();
      $("#forbidAction").hide();
    }

    $("#applyOnDetails").text(
      sprintf(
        applyOnDetails_pattern,
        nbSelected
      )
    );

    // display the number of currently selected photos in the "Selection" fieldset
    if (nbSelected == 0) {
      $("#selectedMessage").text(
        sprintf(
          selectedMessage_none,
          nb_thumbs_set
        )
      );
    }
    else if (nbSelected == nb_thumbs_set) {
      $("#selectedMessage").text(
        sprintf(
          selectedMessage_all,
          nb_thumbs_set
        )
      );
    }
    else {
      $("#selectedMessage").text(
        sprintf(
          selectedMessage_pattern,
          nbSelected,
          nb_thumbs_set
        )
      );
    }
  }

  $('.thumbnails img').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200
  });

  $("[id^=action_]").hide();

  $("select[name=selectAction]").change(function () {
    $("[id^=action_]").hide();
    $("#action_"+$(this).prop("value")).show();

    /* make sure the #albumSelect is on the right select box so that the */
    /* "add new album" popup fills the right select box                  */
    if ("associate" == $(this).prop("value") || "move" == $(this).prop("value")) {
      jQuery("#albumSelect").removeAttr("id");
      jQuery("#action_"+$(this).prop("value")+" select").attr("id", "albumSelect");
    }

    if ($(this).val() != -1) {
      $("#applyActionBlock").show();
    }
    else {
      $("#applyActionBlock").hide();
    }
  });

  $(".wrap1 label").click(function (event) {
    $("input[name=setSelected]").prop('checked', false);

    var wrap2 = $(this).children(".wrap2");
    var checkbox = $(this).children("input[type=checkbox]");

    checkbox.triggerHandler("shclick",event);

    if ($(checkbox).is(':checked')) {
      $(wrap2).addClass("thumbSelected"); 
    }
    else {
      $(wrap2).removeClass('thumbSelected'); 
    }

    checkPermitAction();
  });

  $("#selectAll").click(function () {
    $("input[name=setSelected]").prop('checked', false);
    selectPageThumbnails();
    checkPermitAction();
    return false;
  });

  function selectPageThumbnails() {
    $(".thumbnails label").each(function() {
      var wrap2 = $(this).children(".wrap2");
      var checkbox = $(this).children("input[type=checkbox]");

      $(checkbox).prop('checked', true);
      $(wrap2).addClass("thumbSelected"); 
    });
  }

  $("#selectNone").click(function () {
    $("input[name=setSelected]").prop('checked', false);

    $(".thumbnails label").each(function() {
      var wrap2 = $(this).children(".wrap2");
      var checkbox = $(this).children("input[type=checkbox]");

      $(checkbox).prop('checked', false);
      $(wrap2).removeClass("thumbSelected"); 
    });
    checkPermitAction();
    return false;
  });

  $("#selectInvert").click(function () {
    $("input[name=setSelected]").prop('checked', false);

    $(".thumbnails label").each(function() {
      var wrap2 = $(this).children(".wrap2");
      var checkbox = $(this).children("input[type=checkbox]");

      $(checkbox).prop('checked', !$(checkbox).is(':checked'));

      if ($(checkbox).is(':checked')) {
        $(wrap2).addClass("thumbSelected"); 
      }
      else {
        $(wrap2).removeClass('thumbSelected'); 
      }
    });
    checkPermitAction();
    return false;
  });

  $("#selectSet").click(function () {
    selectPageThumbnails();
    $("input[name=setSelected]").prop('checked', true);
    checkPermitAction();
    return false;
  });

  $("input[name=remove_author]").click(function () {
    if ($(this).is(':checked')) {
      $("input[name=author]").hide();
    }
    else {
      $("input[name=author]").show();
    }
  });

  $("input[name=remove_title]").click(function () {
    if ($(this).is(':checked')) {
      $("input[name=title]").hide();
    }
    else {
      $("input[name=title]").show();
    }
  });

  $("input[name=remove_date_creation]").click(function () {
    if ($(this).is(':checked')) {
      $("#set_date_creation").hide();
    }
    else {
      $("#set_date_creation").show();
    }
  });

  $(".removeFilter").click(function () {
    var filter = $(this).parent('li').attr("id");
    filter_disable(filter);

    return false;
  });

  function filter_enable(filter) {
    /* show the filter*/
    $("#"+filter).show();

    /* check the checkbox to declare we use this filter */
    $("input[type=checkbox][name="+filter+"_use]").prop("checked", true);

    /* forbid to select this filter in the addFilter list */
    $("#addFilter").children("option[value="+filter+"]").attr("disabled", "disabled");
  }

  $("#addFilter").change(function () {
    var filter = $(this).prop("value");
    filter_enable(filter);
    $(this).prop("value", -1);
  });

  function filter_disable(filter) {
    /* hide the filter line */
    $("#"+filter).hide();

    /* uncheck the checkbox to declare we do not use this filter */
    $("input[name="+filter+"_use]").prop("checked", false);

    /* give the possibility to show it again */
    $("#addFilter").children("option[value="+filter+"]").removeAttr("disabled");
  }

  $("#removeFilters").click(function() {
    $("#filterList li").each(function() {
      var filter = $(this).attr("id");
      filter_disable(filter);
    });
    return false;
  });

  jQuery('#applyAction').click(function() {
		var action = jQuery('[name="selectAction"]').val();
		if (action == 'delete_derivatives') {
			var d_count = $('#action_delete_derivatives input[type=checkbox]').filter(':checked').length
				, e_count = $('input[name="setSelected"]').is(':checked') ? nb_thumbs_set : $('.thumbnails input[type=checkbox]').filter(':checked').length;
			if (d_count*e_count > 500)
				return confirm(are_you_sure);
		}
		
		if (action != 'generate_derivatives'
			|| derivatives.finished() )
		{
			return true;
		}

		jQuery('.bulkAction').hide();

		var queuedManager = jQuery.manageAjax.create('queued', { 
			queue: true,  
			cacheResponse: false,
			maxRequests: 1
		});

		derivatives.elements = [];
		if (jQuery('input[name="setSelected"]').is(':checked'))
			derivatives.elements = all_elements;
		else
			jQuery('.thumbnails input[type=checkbox]').each(function() {
				if (jQuery(this).is(':checked')) {
					derivatives.elements.push(jQuery(this).val());
				}
			});

		jQuery('#applyActionBlock').hide();
		jQuery('select[name="selectAction"]').hide();
		jQuery('#regenerationMsg').show();
		
		progress();
		getDerivativeUrls();
		return false;
  });

	function getDerivativeUrls() {
		var ids = derivatives.elements.splice(0, 500);
		var params = {max_urls: 100000, ids: ids, types: []};
		jQuery("#action_generate_derivatives input").each( function(i, t) {
			if ($(t).is(":checked"))
				params.types.push( t.value );
		} );

		jQuery.ajax( {
			type: "POST",
			url: 'ws.php?format=json&method=pwg.getMissingDerivatives',
			data: params,
			dataType: "json",
			success: function(data) {
				if (!data.stat || data.stat != "ok") {
					return;
				}
				derivatives.total += data.result.urls.length;
				progress();
				for (var i=0; i < data.result.urls.length; i++) {
					jQuery.manageAjax.add("queued", {
						type: 'GET', 
						url: data.result.urls[i] + "&ajaxload=true", 
						dataType: 'json',
						success: ( function(data) { derivatives.done++; progress(true) }),
						error: ( function(data) { derivatives.done++; progress(false) })
					});
				}
				if (derivatives.elements.length)
					setTimeout( getDerivativeUrls, 25 * (derivatives.total-derivatives.done));
			}
		} );
	}

  checkPermitAction();
  
  /* dimensions sliders */
  /**
   * find the key from a value in the startStopValues array
   */
  function getSliderKeyFromValue(value, values) {
    for (var key in values) {
      if (values[key] == value) {
        return key;
      }
    }
  
    return 0;
  }


  var dimension_values = {
    'width':[<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['widths'];?>
],
    'height':[<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['heights'];?>
],
    'ratio':[<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratios'];?>
]
  };

  $("#filter_dimension_width_slider").slider({
    range: true,
    min: 0,
    max: dimension_values['width'].length - 1,
    values: [
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_width'];?>
, dimension_values['width']),
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_width'];?>
, dimension_values['width'])
    ],
    slide: function(event, ui) {
      $("input[name='filter_dimension_min_width']").val(dimension_values['width'][ui.values[0]]);
      $("input[name='filter_dimension_max_width']").val(dimension_values['width'][ui.values[1]]);

      $("#filter_dimension_width_info").html(sprintf(
        "<?php echo l10n('between %d and %d pixels');?>
",
        dimension_values['width'][ui.values[0]],
        dimension_values['width'][ui.values[1]]
      ));
    },
    change: function(event, ui) {
      $("input[name='filter_dimension_min_width']").val(dimension_values['width'][ui.values[0]]);
      $("input[name='filter_dimension_max_width']").val(dimension_values['width'][ui.values[1]]);

      $("#filter_dimension_width_info").html(sprintf(
        "<?php echo l10n('between %d and %d pixels');?>
",
        dimension_values['width'][ui.values[0]],
        dimension_values['width'][ui.values[1]]
      ));
    }
  });

  $("#filter_dimension_height_slider").slider({
    range: true,
    min: 0,
    max: dimension_values['height'].length - 1,
    values: [
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_height'];?>
, dimension_values['height']),
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_height'];?>
, dimension_values['height'])
    ],
    slide: function(event, ui) {
      $("input[name='filter_dimension_min_height']").val(dimension_values['height'][ui.values[0]]);
      $("input[name='filter_dimension_max_height']").val(dimension_values['height'][ui.values[1]]);

      $("#filter_dimension_height_info").html(sprintf(
        "<?php echo l10n('between %d and %d pixels');?>
",
        dimension_values['height'][ui.values[0]],
        dimension_values['height'][ui.values[1]]
      ));
    },
    change: function(event, ui) {
      $("input[name='filter_dimension_min_height']").val(dimension_values['height'][ui.values[0]]);
      $("input[name='filter_dimension_max_height']").val(dimension_values['height'][ui.values[1]]);

      $("#filter_dimension_height_info").html(sprintf(
        "<?php echo l10n('between %d and %d pixels');?>
",
        dimension_values['height'][ui.values[0]],
        dimension_values['height'][ui.values[1]]
      ));
    }
  });

  $("#filter_dimension_ratio_slider").slider({
    range: true,
    min: 0,
    max: dimension_values['ratio'].length - 1,
    values: [
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_ratio'];?>
, dimension_values['ratio']),
      getSliderKeyFromValue(<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_ratio'];?>
, dimension_values['ratio'])
    ],
    slide: function(event, ui) {
      $("input[name='filter_dimension_min_ratio']").val(dimension_values['ratio'][ui.values[0]]);
      $("input[name='filter_dimension_max_ratio']").val(dimension_values['ratio'][ui.values[1]]);

      $("#filter_dimension_ratio_info").html(sprintf(
        "<?php echo l10n('between %.2f and %.2f');?>
",
        dimension_values['ratio'][ui.values[0]],
        dimension_values['ratio'][ui.values[1]]
      ));
    },
    change: function(event, ui) {
      $("input[name='filter_dimension_min_ratio']").val(dimension_values['ratio'][ui.values[0]]);
      $("input[name='filter_dimension_max_ratio']").val(dimension_values['ratio'][ui.values[1]]);

      $("#filter_dimension_ratio_info").html(sprintf(
        "<?php echo l10n('between %.2f and %.2f');?>
",
        dimension_values['ratio'][ui.values[0]],
        dimension_values['ratio'][ui.values[1]]
      ));
    }
  });
  
  $("a.dimensions-choice").click(function() {
    var type = jQuery(this).data("type");
    var min = jQuery(this).data("min");
    var max = jQuery(this).data("max");

    $("#filter_dimension_"+ type +"_slider").slider("values", 0,
      getSliderKeyFromValue(min, dimension_values[type])
    );

    $("#filter_dimension_"+type+"_slider").slider("values", 1, 
      getSliderKeyFromValue(max, dimension_values[type])
    );
  });
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div id="batchManagerGlobal">

<h2><?php echo l10n('Batch Manager');?>
</h2>

  <form action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post">
	<input type="hidden" name="start" value="<?php echo $_smarty_tpl->tpl_vars['START']->value;?>
">

  <fieldset>
    <legend><?php echo l10n('Filter');?>
</legend>

    <ul id="filterList">
      <li id="filter_prefilter" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['prefilter'])){?>style="display:none"<?php }?>>
        <a href="#" class="removeFilter" title="<?php echo l10n('remove this filter');?>
"><span>[x]</span></a>
        <input type="checkbox" name="filter_prefilter_use" class="useFilterCheckbox" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['prefilter'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Predefined filter');?>

        <select name="filter_prefilter">
<?php  $_smarty_tpl->tpl_vars['prefilter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prefilter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prefilters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prefilter']->key => $_smarty_tpl->tpl_vars['prefilter']->value){
$_smarty_tpl->tpl_vars['prefilter']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['prefilter']->value['ID'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['prefilter'])&&$_smarty_tpl->tpl_vars['filter']->value['prefilter']==$_smarty_tpl->tpl_vars['prefilter']->value['ID']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['prefilter']->value['NAME'];?>
</option>
<?php } ?>
        </select>
      </li>
      
      <li id="filter_category" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['category'])){?>style="display:none"<?php }?>>
        <a href="#" class="removeFilter" title="remove this filter"><span>[x]</span></a>
        <input type="checkbox" name="filter_category_use" class="useFilterCheckbox" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['category'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Album');?>

        <select style="width:400px" name="filter_category" size="1">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_full_name_options']->value,'selected'=>$_smarty_tpl->tpl_vars['filter_category_selected']->value),$_smarty_tpl);?>

        </select>
        <label><input type="checkbox" name="filter_category_recursive" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['category_recursive'])){?>checked="checked"<?php }?>> <?php echo l10n('include child albums');?>
</label>
      </li>
      
      <li id="filter_tags" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['tags'])){?>style="display:none"<?php }?>>
        <a href="#" class="removeFilter" title="remove this filter"><span>[x]</span></a>
        <input type="checkbox" name="filter_tags_use" class="useFilterCheckbox" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['tags'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Tags');?>

        <select id="tagsFilter" name="filter_tags">
          <?php if (isset($_smarty_tpl->tpl_vars['filter_tags']->value)){?><?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
          <?php } ?><?php }?>
        </select>
        <label><span><input type="radio" name="tag_mode" value="AND" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['tag_mode'])||$_smarty_tpl->tpl_vars['filter']->value['tag_mode']=='AND'){?>checked="checked"<?php }?>> <?php echo l10n('All tags');?>
</span></label>
        <label><span><input type="radio" name="tag_mode" value="OR" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['tag_mode'])&&$_smarty_tpl->tpl_vars['filter']->value['tag_mode']=='OR'){?>checked="checked"<?php }?>> <?php echo l10n('Any tag');?>
</span></label>
      </li>
      
      <li id="filter_level" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['level'])){?>style="display:none"<?php }?>>
        <a href="#" class="removeFilter" title="remove this filter"><span>[x]</span></a>
        <input type="checkbox" name="filter_level_use" class="useFilterCheckbox" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['level'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Privacy level');?>

        <select name="filter_level" size="1">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['filter_level_options']->value,'selected'=>$_smarty_tpl->tpl_vars['filter_level_options_selected']->value),$_smarty_tpl);?>

        </select>
        <label><input type="checkbox" name="filter_level_include_lower" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['level_include_lower'])){?>checked="checked"<?php }?>> <?php echo l10n('include photos with lower privacy level');?>
</label>
      </li>
      
      <li id="filter_dimension" <?php if (!isset($_smarty_tpl->tpl_vars['filter']->value['dimension'])){?>style="display:none"<?php }?>>
        <a href="#" class="removeFilter" title="remove this filter"><span>[x]</span></a>
        <input type="checkbox" name="filter_dimension_use" class="useFilterCheckbox" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['dimension'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Dimensions');?>

        
        <blockquote>
          <?php echo l10n('Width');?>
 <span id="filter_dimension_width_info"><?php echo l10n('between %d and %d pixels',$_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_width'],$_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_width']);?>
</span>
          | <a class="dimensions-choice" data-type="width" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['min_width'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['max_width'];?>
"><?php echo l10n('Reset');?>
</a>
          <div id="filter_dimension_width_slider"></div>
          
          <?php echo l10n('Height');?>
 <span id="filter_dimension_height_info"><?php echo l10n('between %d and %d pixels',$_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_height'],$_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_height']);?>
</span>
          | <a class="dimensions-choice" data-type="height" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['min_height'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['max_height'];?>
"><?php echo l10n('Reset');?>
</a>
          <div id="filter_dimension_height_slider"></div>
          
          <?php echo l10n('Ratio');?>
 (<?php echo l10n('Width');?>
/<?php echo l10n('Height');?>
) <span id="filter_dimension_ratio_info"><?php echo l10n('between %.2f and %.2f',$_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_ratio'],$_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_ratio']);?>
</span>
<?php if (isset($_smarty_tpl->tpl_vars['dimensions']->value['ratio_portrait'])){?>
          | <a class="dimensions-choice" data-type="ratio" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_portrait']['min'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_portrait']['max'];?>
"><?php echo l10n('Portrait');?>
</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['dimensions']->value['ratio_square'])){?>
          | <a class="dimensions-choice" data-type="ratio" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_square']['min'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_square']['max'];?>
"><?php echo l10n('square');?>
</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['dimensions']->value['ratio_landscape'])){?>
          | <a class="dimensions-choice" data-type="ratio" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_landscape']['min'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_landscape']['max'];?>
"><?php echo l10n('Landscape');?>
</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['dimensions']->value['ratio_panorama'])){?>
          | <a class="dimensions-choice" data-type="ratio" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_panorama']['min'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['ratio_panorama']['max'];?>
"><?php echo l10n('Panorama');?>
</a>
<?php }?>
          | <a class="dimensions-choice" data-type="ratio" data-min="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['min_ratio'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['bounds']['max_ratio'];?>
"><?php echo l10n('Reset');?>
</a>
          <div id="filter_dimension_ratio_slider"></div>
        </blockquote>
        
        <input type="hidden" name="filter_dimension_min_width" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_width'];?>
">
        <input type="hidden" name="filter_dimension_max_width" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_width'];?>
">
        <input type="hidden" name="filter_dimension_min_height" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_height'];?>
">
        <input type="hidden" name="filter_dimension_max_height" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_height'];?>
">
        <input type="hidden" name="filter_dimension_min_ratio" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['min_ratio'];?>
">
        <input type="hidden" name="filter_dimension_max_ratio" value="<?php echo $_smarty_tpl->tpl_vars['dimensions']->value['selected']['max_ratio'];?>
">
      </li>
    </ul>

    <p class="actionButtons">
      <select id="addFilter">
        <option value="-1"><?php echo l10n('Add a filter');?>
</option>
        <option disabled="disabled">------------------</option>
        <option value="filter_prefilter" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['prefilter'])){?>disabled="disabled"<?php }?>><?php echo l10n('Predefined filter');?>
</option>
        <option value="filter_category" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['category'])){?>disabled="disabled"<?php }?>><?php echo l10n('Album');?>
</option>
        <option value="filter_tags" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['tags'])){?>disabled="disabled"<?php }?>><?php echo l10n('Tags');?>
</option>
        <option value="filter_level" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['level'])){?>disabled="disabled"<?php }?>><?php echo l10n('Privacy level');?>
</option>
        <option value="filter_dimension" <?php if (isset($_smarty_tpl->tpl_vars['filter']->value['dimension'])){?>disabled="disabled"<?php }?>><?php echo l10n('Dimensions');?>
</option>
      </select>
      <a id="removeFilters" href=""><?php echo l10n('Remove all filters');?>
</a>
    </p>

    <p class="actionButtons" id="applyFilterBlock">
      <input id="applyFilter" class="submit" type="submit" value="<?php echo l10n('Refresh photo set');?>
" name="submitFilter">
    </p>

  </fieldset>

  <fieldset>

    <legend><?php echo l10n('Selection');?>
</legend>

<?php if (!empty($_smarty_tpl->tpl_vars['thumbnails']->value)){?>
  <p id="checkActions">
    <?php echo l10n('Select:');?>

<?php if ($_smarty_tpl->tpl_vars['nb_thumbs_set']->value>$_smarty_tpl->tpl_vars['nb_thumbs_page']->value){?>
    <a href="#" id="selectAll"><?php echo l10n('The whole page');?>
</a>,
    <a href="#" id="selectSet"><?php echo l10n('The whole set');?>
</a>,
<?php }else{ ?>
    <a href="#" id="selectAll"><?php echo l10n('All');?>
</a>,
<?php }?>
    <a href="#" id="selectNone"><?php echo l10n('None');?>
</a>,
    <a href="#" id="selectInvert"><?php echo l10n('Invert');?>
</a>

    <span id="selectedMessage"></span>

    <input type="checkbox" name="setSelected" style="display:none" <?php if (count($_smarty_tpl->tpl_vars['selection']->value)==$_smarty_tpl->tpl_vars['nb_thumbs_set']->value){?>checked="checked"<?php }?>>
  </p>

	<ul class="thumbnails">
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

UL.thumbnails SPAN.wrap2{
  width: <?php echo $_smarty_tpl->tpl_vars['thumb_params']->value->max_width()+2;?>
px;
}
UL.thumbnails SPAN.wrap2 {
  height: <?php echo $_smarty_tpl->tpl_vars['thumb_params']->value->max_height()+25;?>
px;
}
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php  $_smarty_tpl->tpl_vars['thumbnail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thumbnail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thumbnails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->key => $_smarty_tpl->tpl_vars['thumbnail']->value){
$_smarty_tpl->tpl_vars['thumbnail']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['isSelected'])) {$_smarty_tpl->tpl_vars['isSelected'] = clone $_smarty_tpl->tpl_vars['isSelected'];
$_smarty_tpl->tpl_vars['isSelected']->value = in_array($_smarty_tpl->tpl_vars['thumbnail']->value['id'],$_smarty_tpl->tpl_vars['selection']->value); $_smarty_tpl->tpl_vars['isSelected']->nocache = null; $_smarty_tpl->tpl_vars['isSelected']->scope = 0;
} else $_smarty_tpl->tpl_vars['isSelected'] = new Smarty_variable(in_array($_smarty_tpl->tpl_vars['thumbnail']->value['id'],$_smarty_tpl->tpl_vars['selection']->value), null, 0);?>
		<li>
			<span class="wrap1">
				<label>
					<input type="checkbox" name="selection[]" value="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['isSelected']->value){?>checked="checked"<?php }?>>
					<span class="wrap2<?php if ($_smarty_tpl->tpl_vars['isSelected']->value){?> thumbSelected<?php }?>">
					<div class="actions"><a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['FILE_SRC'];?>
" class="preview-box"><?php echo l10n('Zoom');?>
</a> &middot; <a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['U_EDIT'];?>
" target="_blank"><?php echo l10n('Edit');?>
</a></div>
<?php if ($_smarty_tpl->tpl_vars['thumbnail']->value['level']>0){?>
						<em class="levelIndicatorB"><?php echo l10n(sprintf('Level %d',$_smarty_tpl->tpl_vars['thumbnail']->value['level']));?>
</em>
						<em class="levelIndicatorF" title="<?php echo l10n('Who can see these photos?');?>
 : "><?php echo l10n(sprintf('Level %d',$_smarty_tpl->tpl_vars['thumbnail']->value['level']));?>
</em>
<?php }?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['thumb']->get_url();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['file'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['thumbnail']->value['TITLE'], ENT_QUOTES, 'UTF-8', true);?>
" <?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['thumb']->get_size_htm();?>
>
					</span>
				</label>
			</span>
		</li>
<?php } ?>
	</ul>

<?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?>
  <div style="clear:both;">

    <div style="float:left">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>

    <div style="float:right;margin-top:10px;"><?php echo l10n('display');?>

      <a href="<?php echo $_smarty_tpl->tpl_vars['U_DISPLAY']->value;?>
&amp;display=20">20</a>
      &middot; <a href="<?php echo $_smarty_tpl->tpl_vars['U_DISPLAY']->value;?>
&amp;display=50">50</a>
      &middot; <a href="<?php echo $_smarty_tpl->tpl_vars['U_DISPLAY']->value;?>
&amp;display=100">100</a>
      &middot; <a href="<?php echo $_smarty_tpl->tpl_vars['U_DISPLAY']->value;?>
&amp;display=all"><?php echo l10n('all');?>
</a>
      <?php echo l10n('photos per page');?>

    </div>
  </div>
<?php }?>
<?php }else{ ?>
  <div><?php echo l10n('No photo in the current set.');?>
</div>
<?php }?>
  </fieldset>

  <fieldset id="action">

    <legend><?php echo l10n('Action');?>
</legend>
      <div id="forbidAction"<?php if (count($_smarty_tpl->tpl_vars['selection']->value)!=0){?> style="display:none"<?php }?>><?php echo l10n('No photo selected, no action possible.');?>
</div>
      <div id="permitAction"<?php if (count($_smarty_tpl->tpl_vars['selection']->value)==0){?> style="display:none"<?php }?>>

    <select name="selectAction">
      <option value="-1"><?php echo l10n('Choose an action');?>
</option>
      <option disabled="disabled">------------------</option>
      <option value="delete" class="icon-trash"><?php echo l10n('Delete selected photos');?>
</option>
      <option value="associate"><?php echo l10n('Associate to album');?>
</option>
      <option value="move"><?php echo l10n('Move to album');?>
</option>
<?php if (!empty($_smarty_tpl->tpl_vars['dissociate_options']->value)){?>
      <option value="dissociate"><?php echo l10n('Dissociate from album');?>
</option>
<?php }?>
      <option value="add_tags"><?php echo l10n('Add tags');?>
</option>
<?php if (!empty($_smarty_tpl->tpl_vars['DEL_TAG_SELECTION']->value)){?>
      <option value="del_tags"><?php echo l10n('remove tags');?>
</option>
<?php }?>
      <option value="author"><?php echo l10n('Set author');?>
</option>
      <option value="title"><?php echo l10n('Set title');?>
</option>
      <option value="date_creation"><?php echo l10n('Set creation date');?>
</option>
      <option value="level" class="icon-lock"><?php echo l10n('Who can see these photos?');?>
</option>
      <option value="metadata"><?php echo l10n('Synchronize metadata');?>
</option>
<?php if (($_smarty_tpl->tpl_vars['IN_CADDIE']->value)){?>
      <option value="remove_from_caddie"><?php echo l10n('Remove from caddie');?>
</option>
<?php }else{ ?>
      <option value="add_to_caddie"><?php echo l10n('Add to caddie');?>
</option>
<?php }?>
		<option value="delete_derivatives"><?php echo l10n('Delete multiple size images');?>
</option>
		<option value="generate_derivatives"><?php echo l10n('Generate multiple size images');?>
</option>
<?php if (!empty($_smarty_tpl->tpl_vars['element_set_global_plugins_actions']->value)){?>
<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element_set_global_plugins_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['action']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['action']->value['NAME'];?>
</option>
<?php } ?>
<?php }?>
    </select>

    <!-- delete -->
    <div id="action_delete" class="bulkAction">
    <p><label><input type="checkbox" name="confirm_deletion" value="1"> <?php echo l10n('Are you sure?');?>
</label></p>
    </div>

    <!-- associate -->
    <div id="action_associate" class="bulkAction">
          <select style="width:400px" name="associate" size="1">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_full_name_options']->value),$_smarty_tpl);?>

         </select>
<br><?php echo l10n('... or ');?>
 <a href="#" class="addAlbumOpen" title="<?php echo l10n('create a new album');?>
"><?php echo l10n('create a new album');?>
</a>
    </div>

    <!-- move -->
    <div id="action_move" class="bulkAction">
          <select style="width:400px" name="move" size="1">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_full_name_options']->value),$_smarty_tpl);?>

         </select>
<br><?php echo l10n('... or ');?>
 <a href="#" class="addAlbumOpen" title="<?php echo l10n('create a new album');?>
"><?php echo l10n('create a new album');?>
</a>
    </div>


    <!-- dissociate -->
    <div id="action_dissociate" class="bulkAction">
          <select style="width:400px" name="dissociate" size="1">
            <?php if (!empty($_smarty_tpl->tpl_vars['dissociate_options']->value)){?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['dissociate_options']->value),$_smarty_tpl);?>
<?php }?>
          </select>
    </div>


    <!-- add_tags -->
    <div id="action_add_tags" class="bulkAction">
<select id="tags" name="add_tags">
</select>
    </div>

    <!-- del_tags -->
    <div id="action_del_tags" class="bulkAction">
<?php if (!empty($_smarty_tpl->tpl_vars['DEL_TAG_SELECTION']->value)){?><?php echo $_smarty_tpl->tpl_vars['DEL_TAG_SELECTION']->value;?>
<?php }?>
    </div>

    <!-- author -->
    <div id="action_author" class="bulkAction">
    <label><input type="checkbox" name="remove_author"> <?php echo l10n('remove author');?>
</label><br>
    <?php if (isset($_smarty_tpl->tpl_vars['authorDefaultValue'])) {$_smarty_tpl->tpl_vars['authorDefaultValue'] = clone $_smarty_tpl->tpl_vars['authorDefaultValue'];
$_smarty_tpl->tpl_vars['authorDefaultValue']->value = l10n('Type here the author name'); $_smarty_tpl->tpl_vars['authorDefaultValue']->nocache = null; $_smarty_tpl->tpl_vars['authorDefaultValue']->scope = 0;
} else $_smarty_tpl->tpl_vars['authorDefaultValue'] = new Smarty_variable(l10n('Type here the author name'), null, 0);?>
<input type="text" class="large" name="author" value="<?php echo $_smarty_tpl->tpl_vars['authorDefaultValue']->value;?>
" onfocus="this.value=(this.value=='<?php echo strtr($_smarty_tpl->tpl_vars['authorDefaultValue']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo strtr($_smarty_tpl->tpl_vars['authorDefaultValue']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
' : this.value;">
    </div>    

    <!-- title -->
    <div id="action_title" class="bulkAction">
    <label><input type="checkbox" name="remove_title"> <?php echo l10n('remove title');?>
</label><br>
    <?php if (isset($_smarty_tpl->tpl_vars['titleDefaultValue'])) {$_smarty_tpl->tpl_vars['titleDefaultValue'] = clone $_smarty_tpl->tpl_vars['titleDefaultValue'];
$_smarty_tpl->tpl_vars['titleDefaultValue']->value = l10n('Type here the title'); $_smarty_tpl->tpl_vars['titleDefaultValue']->nocache = null; $_smarty_tpl->tpl_vars['titleDefaultValue']->scope = 0;
} else $_smarty_tpl->tpl_vars['titleDefaultValue'] = new Smarty_variable(l10n('Type here the title'), null, 0);?>
<input type="text" class="large" name="title" value="<?php echo $_smarty_tpl->tpl_vars['titleDefaultValue']->value;?>
" onfocus="this.value=(this.value=='<?php echo strtr($_smarty_tpl->tpl_vars['titleDefaultValue']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo strtr($_smarty_tpl->tpl_vars['titleDefaultValue']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
' : this.value;">
    </div>

    <!-- date_creation -->
    <div id="action_date_creation" class="bulkAction">
      <label><input type="checkbox" name="remove_date_creation"> <?php echo l10n('remove creation date');?>
</label><br>
      <div id="set_date_creation">
          <select id="date_creation_day" name="date_creation_day">
             <option value="0">--</option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['day'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['day']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['name'] = 'day';
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total']);
?>
              <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['day']['index']==$_smarty_tpl->tpl_vars['DATE_CREATION_DAY']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
</option>
<?php endfor; endif; ?>
          </select>
          <select id="date_creation_month" name="date_creation_month">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['month_list']->value,'selected'=>$_smarty_tpl->tpl_vars['DATE_CREATION_MONTH']->value),$_smarty_tpl);?>

          </select>
          <input id="date_creation_year"
                 name="date_creation_year"
                 type="text"
                 size="4"
                 maxlength="4"
                 value="<?php echo $_smarty_tpl->tpl_vars['DATE_CREATION_YEAR']->value;?>
">
          <input id="date_creation_linked_date" name="date_creation_linked_date" type="hidden" size="10" disabled="disabled">
      </div>
    </div>

    <!-- level -->
    <div id="action_level" class="bulkAction">
        <select name="level" size="1">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['level_options']->value,'selected'=>$_smarty_tpl->tpl_vars['level_options_selected']->value),$_smarty_tpl);?>

        </select>
    </div>

    <!-- metadata -->
    <div id="action_metadata" class="bulkAction">
    </div>

		<!-- generate derivatives -->
		<div id="action_generate_derivatives" class="bulkAction">
			<a href="javascript:selectGenerateDerivAll()"><?php echo l10n('All');?>
</a>,
			<a href="javascript:selectGenerateDerivNone()"><?php echo l10n('None');?>
</a>
			<br>
<?php  $_smarty_tpl->tpl_vars['disp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['disp']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['generate_derivatives_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['disp']->key => $_smarty_tpl->tpl_vars['disp']->value){
$_smarty_tpl->tpl_vars['disp']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['disp']->key;
?>
				<label><input type="checkbox" name="generate_derivatives_type[]" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['disp']->value;?>
</label>
<?php } ?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

			function selectGenerateDerivAll() {
				$("#action_generate_derivatives input[type=checkbox]").prop("checked", true);
			}
			function selectGenerateDerivNone() {
				$("#action_generate_derivatives input[type=checkbox]").prop("checked", false);
			}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</div>

		<!-- delete derivatives -->
		<div id="action_delete_derivatives" class="bulkAction">
			<a href="javascript:selectDelDerivAll()"><?php echo l10n('All');?>
</a>,
			<a href="javascript:selectDelDerivNone()"><?php echo l10n('None');?>
</a>
			<br>
<?php  $_smarty_tpl->tpl_vars['disp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['disp']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['del_derivatives_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['disp']->key => $_smarty_tpl->tpl_vars['disp']->value){
$_smarty_tpl->tpl_vars['disp']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['disp']->key;
?>
				<label><input type="checkbox" name="del_derivatives_type[]" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['disp']->value;?>
</label>
<?php } ?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

			function selectDelDerivAll() {
				$("#action_delete_derivatives input[type=checkbox]").prop("checked", true);
			}
			function selectDelDerivNone() {
				$("#action_delete_derivatives input[type=checkbox]").prop("checked", false);
			}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</div>
		
    <!-- progress bar -->
    <div id="regenerationMsg" class="bulkAction" style="display:none">
      <p id="regenerationText" style="margin-bottom:10px;"><?php echo l10n('Generate multiple size images');?>
</p>
      <span class="progressBar" id="progressBar"></span>
      <input type="hidden" name="regenerateSuccess" value="0">
      <input type="hidden" name="regenerateError" value="0">
    </div>

    <!-- plugins -->
<?php if (!empty($_smarty_tpl->tpl_vars['element_set_global_plugins_actions']->value)){?>
<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element_set_global_plugins_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
    <div id="action_<?php echo $_smarty_tpl->tpl_vars['action']->value['ID'];?>
" class="bulkAction">
    <?php if (!empty($_smarty_tpl->tpl_vars['action']->value['CONTENT'])){?><?php echo $_smarty_tpl->tpl_vars['action']->value['CONTENT'];?>
<?php }?>
    </div>
<?php } ?>
<?php }?>

    <p id="applyActionBlock" style="display:none" class="actionButtons">
      <input id="applyAction" class="submit" type="submit" value="<?php echo l10n('Apply action');?>
" name="submit"> <span id="applyOnDetails"></span></p>

    </div> <!-- #permitAction -->
  </fieldset>

  </form>

</div> <!-- #batchManagerGlobal -->
<?php }} ?>