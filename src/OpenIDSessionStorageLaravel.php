<?php

namespace AuthOpenIdConnect;

class OpenIDSessionStorageLaravel implements \OpenIDSessionStorageIF {

	/**
	 * {@inheritDoc}
	 * @see OpenIDSessionStorageIF::storeNonce()
	 */
	public function storeNonce($nonce) {
		return session(['openid_connect_nonce' => $nonce]);
	}
	/**
	 * {@inheritDoc}
	 * @see OpenIDSessionStorageIF::getNonce()
	 */
	public function getNonce() {
		return session('openid_connect_nonce');
	}
	/**
	 * {@inheritDoc}
	 * @see OpenIDSessionStorageIF::storeState()
	 */
	public function storeState($state) {
		return session(['openid_connect_state' => $state]);
	}
	/**
	 * {@inheritDoc}
	 * @see OpenIDSessionStorageIF::getState()
	 */
	public function getState() {
		return session('openid_connect_state');
	}
	/**
	 * {@inheritDoc}
	 * @see OpenIDSessionStorageIF::clear()
	 */
	public function clear() {
		try {
			session()->forget('openid_connect_nonce');
			session()->forget('openid_connect_state');
		} catch (Exception $e) {}
	}

}