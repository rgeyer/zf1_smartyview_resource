<?php
/*
Copyright (c) 2012 Ryan J. Geyer <me@ryangeyer.com>

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

class ZSmarty_Resource_View extends Zend_Application_Resource_View {
	public function getView() {
		if(null == $this->_view) {
			$options = $this->getBootStrap()->getOption('smarty');
			$this->_view = new ZSmarty_Smarty($options);

			print_r($options);
			
			// setup viewRenderer with suffix and view
			$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
			$viewRenderer->setViewSuffix('tpl');
			$viewRenderer->setView($this->_view);
			
			// ensure we have layout bootstraped
			#$this->getBootstrap()->bootstrap('Layout');
			// set the tpl suffix to layout also
			#$layout = Zend_Layout::getMvcInstance();
			#$layout->setViewSuffix('tpl');
			
			/*if(isset($options['doctype'])) {
				$this->_view->doctype()->setDoctype(strtoupper($options['doctype']));
				if(isset($options['charset']) && $this->_view->doctype()->isHtml5()) {
					$this->_view->headMeta()->setCharset($options['charset']);
				}
			}
			if(isset($options['contentType'])) {
				$this->_view->headMeta()->appendHttpEquiv('Content-Type', $options['contentType']);
			}*/
		}
		
		return $this->_view;
	}
}