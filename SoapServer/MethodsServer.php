<?php

namespace SoapServer;

class MethodsServer
{
	/**
	 * @soap
	 * @return string
	 */
	public function create($xml) {

		$dom = new \DOMDocument();
		$dom->loadXML($xml);

		$requestTag = $dom->getElementsByTagName('request')->item(0);
		$queueTag = $dom->getElementsByTagName('queue')->item(0);
		$itemsTag = $dom->getElementsByTagName('item');

		$domResponse = new \DOMDocument();
		$tagResponse = $domResponse->createElement('response');
		$tagResponse->setAttribute('store', $requestTag->getAttribute('store'));
		$tagResponse->setAttribute('total', $requestTag->getAttribute('total'));
		$tagResponse->setAttribute('venture', $requestTag->getAttribute('store'));
		$tagResponse->setAttribute('venture', 'HOSANNA');

		$tagQueue = $domResponse->createElement('queue');
		$tagQueue->setAttribute('id', $queueTag->getAttribute('id'));
		$tagQueue->setAttribute('qty', $queueTag->getAttribute('total'));


		foreach ($itemsTag as $itemTag) {

			$data = new \DateTime();
			$field = $itemTag->getElementsByTagName('fields')->item(0);

			$fieldsTag = $domResponse->createElement('fields');
			$itemvendaIdTag = $domResponse->createElement('itens_venda_id', $field->getElementsByTagName('itens_venda_id')->item(0));
			$searchKey = $domResponse->createElement('search_key_1', $data->format('Y-m-d H:i:s'));

			$fieldsTag->appendChild($itemvendaIdTag);
			$fieldsTag->appendChild($searchKey);

			$tagItem = $domResponse->createElement('item');
			$tagItem->setAttribute('status', 'S');
			$tagItem->setAttribute('crm_id', uniqid());
			$tagItem->appendChild($fieldsTag);

			$tagQueue->appendChild($tagItem);
		}

		$tagResponse->appendChild($tagQueue);
		$domResponse->appendChild($tagResponse);
		return $domResponse->saveXML();

		return '<response total="1" venture="MOB" store="MOB" partner="HOSANNA">
				<queue id="11" qty="1">
					<item no="1">
						<status>S</status>
						<crm_id>c327b349ed3db3b6611b01d22012c80b</crm_id>
						<message></message>
					</item>
				</queue>
				</response>';
	}
}