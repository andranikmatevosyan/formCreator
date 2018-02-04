-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 04 2018 г., 12:46
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `form`
--

-- --------------------------------------------------------

--
-- Структура таблицы `form_fields`
--

CREATE TABLE IF NOT EXISTS `form_fields` (
  `id` int(11) NOT NULL,
  `formId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `subtype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `placeholder` varchar(255) NOT NULL,
  `help` varchar(255) NOT NULL,
  `required` int(4) NOT NULL,
  `rows` varchar(64) NOT NULL,
  `min` varchar(64) NOT NULL,
  `max` varchar(64) NOT NULL,
  `step` varchar(64) NOT NULL,
  `inline` int(4) NOT NULL,
  `multiple` int(4) NOT NULL,
  `toggle` int(4) NOT NULL,
  `style` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form_fields`
--

INSERT INTO `form_fields` (`id`, `formId`, `type`, `subtype`, `name`, `class`, `label`, `value`, `placeholder`, `help`, `required`, `rows`, `min`, `max`, `step`, `inline`, `multiple`, `toggle`, `style`) VALUES
(13, 2, 'header', 'h3', '', 'text-center', 'Header', '', '', '', 0, '', '', '', '', 0, 0, 0, ''),
(14, 2, 'hidden', '', 'hidden-1517655360518', '', '', 'value', '', '', 0, '', '', '', '', 0, 0, 0, ''),
(15, 2, 'starRating', '', 'starrating1', '', 'Star Rating', '4', 'placeholder', 'help', 1, '', '', '', '', 0, 0, 0, ''),
(16, 2, 'text', 'email', 'text1', 'green form-control', 'Text Field', '', 'placeholder', 'help text', 1, '', '', '', '', 0, 0, 0, ''),
(17, 2, 'select', '', 'select-1517655326751', 'form-control', 'Select', '', 'placeholder', 'help', 1, '', '', '', '', 0, 0, 0, ''),
(18, 2, 'date', '', 'date1', 'form-control', 'Date Field', '', 'placeholder', 'help', 0, '', '', '', '', 0, 0, 0, ''),
(19, 2, 'file', 'file', 'file1', 'form-control', 'File Upload', '', 'placeholder', 'help', 0, '', '', '', '', 0, 1, 0, ''),
(20, 2, 'checkbox-group', '', 'checkbox-group-1517655445380', '', 'Checkbox Group', '', '', 'help', 1, '', '', '', '', 1, 0, 1, ''),
(21, 2, 'radio-group', '', 'radio-group-1517655486404', '', 'Radio Group', '', '', 'help', 1, '', '', '', '', 1, 0, 0, ''),
(22, 2, 'number', '', 'number-1517655542931', 'form-control', 'Number', '1', 'placeholder', 'help', 0, '', '1', '10', '1', 0, 0, 0, ''),
(23, 2, 'textarea', 'tinymce', 'textarea1', 'form-control', 'tinyMCE', '', 'placeholder', 'help', 1, '8', '', '', '', 0, 0, 0, ''),
(24, 2, 'button', 'button', 'button1', 'btn pull-right btn-info', 'Save Data', '', '', '', 0, '', '', '', '', 0, 0, 0, 'info'),
(25, 3, 'header', 'h1', '', '', 'Header', '', '', '', 0, '', '', '', '', 0, 0, 0, ''),
(26, 3, 'checkbox-group', '', 'checkbox-group-1517729789133', '', 'Checkbox Group', '', '', '', 1, '', '', '', '', 1, 0, 1, ''),
(27, 3, 'textarea', 'tinymce', 'textarea-1517729774588', 'form-control', 'tinyMCE', '', '', '', 1, '', '', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `form_general`
--

CREATE TABLE IF NOT EXISTS `form_general` (
  `id` int(11) NOT NULL,
  `formName` varchar(255) NOT NULL,
  `formId` varchar(255) NOT NULL,
  `formClass` varchar(255) NOT NULL,
  `formAction` varchar(255) NOT NULL,
  `formMethod` varchar(64) NOT NULL,
  `formJson` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form_general`
--

INSERT INTO `form_general` (`id`, `formName`, `formId`, `formClass`, `formAction`, `formMethod`, `formJson`) VALUES
(2, 'form1', 'form1', 'form1', '', 'post', '[\n	{\n		"type": "header",\n		"subtype": "h3",\n		"label": "Header",\n		"className": "text-center"\n	},\n	{\n		"type": "hidden",\n		"name": "hidden-1517655360518",\n		"value": "value"\n	},\n	{\n		"type": "starRating",\n		"required": true,\n		"label": "Star Rating",\n		"description": "help",\n		"placeholder": "placeholder",\n		"name": "starrating1",\n		"value": "4"\n	},\n	{\n		"type": "text",\n		"subtype": "email",\n		"required": true,\n		"label": "Text Field",\n		"description": "help text",\n		"placeholder": "placeholder",\n		"name": "text1",\n		"maxlength": "3",\n		"className": "green form-control"\n	},\n	{\n		"type": "select",\n		"required": true,\n		"label": "Select",\n		"description": "help",\n		"placeholder": "placeholder",\n		"className": "form-control",\n		"name": "select-1517655326751",\n		"values": [\n			{\n				"label": "Option 1",\n				"value": "option-1",\n				"selected": true\n			},\n			{\n				"label": "Option 2",\n				"value": "option-2"\n			},\n			{\n				"label": "Option 3",\n				"value": "option-3"\n			}\n		]\n	},\n	{\n		"type": "date",\n		"label": "Date Field",\n		"description": "help",\n		"placeholder": "placeholder",\n		"className": "form-control",\n		"name": "date1"\n	},\n	{\n		"type": "file",\n		"label": "File Upload",\n		"description": "help",\n		"placeholder": "placeholder",\n		"className": "form-control",\n		"name": "file1",\n		"subtype": "file",\n		"multiple": true\n	},\n	{\n		"type": "checkbox-group",\n		"required": true,\n		"label": "Checkbox Group",\n		"description": "help",\n		"toggle": true,\n		"inline": true,\n		"name": "checkbox-group-1517655445380",\n		"other": true,\n		"values": [\n			{\n				"label": "Option 1",\n				"value": "option-1",\n				"selected": true\n			},\n			{\n				"label": "Option 2",\n				"value": "option-2",\n				"selected": true\n			}\n		]\n	},\n	{\n		"type": "radio-group",\n		"required": true,\n		"label": "Radio Group",\n		"description": "help",\n		"inline": true,\n		"name": "radio-group-1517655486404",\n		"values": [\n			{\n				"label": "Option 1",\n				"value": "option-1",\n				"selected": true\n			},\n			{\n				"label": "Option 2",\n				"value": "option-2"\n			},\n			{\n				"label": "Option 3",\n				"value": "option-3"\n			}\n		]\n	},\n	{\n		"type": "number",\n		"label": "Number",\n		"description": "help",\n		"placeholder": "placeholder",\n		"className": "form-control",\n		"name": "number-1517655542931",\n		"value": "1",\n		"min": "1",\n		"max": "10",\n		"step": "1"\n	},\n	{\n		"type": "textarea",\n		"subtype": "tinymce",\n		"required": true,\n		"label": "tinyMCE",\n		"description": "help",\n		"placeholder": "placeholder",\n		"className": "form-control",\n		"name": "textarea1",\n		"rows": "8"\n	},\n	{\n		"type": "button",\n		"label": "Save Data",\n		"subtype": "button",\n		"className": "btn pull-right btn-info",\n		"name": "button1",\n		"style": "info"\n	}\n]'),
(3, 'form2', 'form2', 'form2', '', 'post', '[\n	{\n		"type": "header",\n		"subtype": "h1",\n		"label": "Header"\n	},\n	{\n		"type": "checkbox-group",\n		"required": true,\n		"label": "Checkbox Group",\n		"toggle": true,\n		"inline": true,\n		"name": "checkbox-group-1517729789133",\n		"values": [\n			{\n				"label": "Option 1",\n				"value": "option-1"\n			},\n			{\n				"label": "Option 2",\n				"value": "option-2"\n			},\n			{\n				"label": "Option 3",\n				"value": "option-3"\n			}\n		]\n	},\n	{\n		"type": "textarea",\n		"subtype": "tinymce",\n		"required": true,\n		"label": "tinyMCE",\n		"className": "form-control",\n		"name": "textarea-1517729774588"\n	}\n]');

-- --------------------------------------------------------

--
-- Структура таблицы `form_options`
--

CREATE TABLE IF NOT EXISTS `form_options` (
  `id` int(11) NOT NULL,
  `fieldId` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `selected` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form_options`
--

INSERT INTO `form_options` (`id`, `fieldId`, `label`, `value`, `selected`) VALUES
(1, 17, 'Option 1', 'option-1', 1),
(2, 17, 'Option 2', 'option-2', 0),
(3, 17, 'Option 3', 'option-3', 0),
(4, 20, 'Option 1', 'option-1', 1),
(5, 20, 'Option 2', 'option-2', 1),
(6, 21, 'Option 1', 'option-1', 1),
(7, 21, 'Option 2', 'option-2', 0),
(8, 21, 'Option 3', 'option-3', 0),
(9, 26, 'Option 1', 'option-1', 0),
(10, 26, 'Option 2', 'option-2', 0),
(11, 26, 'Option 3', 'option-3', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_general`
--
ALTER TABLE `form_general`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_options`
--
ALTER TABLE `form_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `form_general`
--
ALTER TABLE `form_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `form_options`
--
ALTER TABLE `form_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
