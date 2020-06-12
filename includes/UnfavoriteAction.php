<?php

class UnfavoriteAction extends BaseAction {
	/**
	 * @inheritDoc
	 */
	public function getName() {
		return 'unfavorite';
	}

	protected function successMessage() {
		return 'removedfavoritetext';
	}

	protected function doAction(
		\Wikimedia\Rdbms\DBConnRef $dbw, int $subject, User $user, Title $title
	) {
		$dbw->delete( 'favoritelist', [
			'fl_user' => $user->getId(),
			'fl_namespace' => $subject,
			'fl_title' => $title->getDBkey(),
		], __METHOD__ );

		return $dbw->affectedRows() === 1;
	}
}
