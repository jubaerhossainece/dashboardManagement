export default class Gate{
	constructor(user) {
		this.user = user;
	}

	isAdmin() {
		return this.user.type === 'admin';
	}

	isUser() {
		return this.user.type === 'user';
	}

	isAdminOrModerator() {
		if(this.user.type === 'admin' || this.user.type === 'moderator'){
			return true;
		}
	}
}