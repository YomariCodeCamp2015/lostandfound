<?php
class Controller_Admin_Message extends Controller_Admin
{

	public function action_index()
	{
		$data['messages'] = Model_Message::find('all');
		$this->template->title = "Messages";
		$this->template->content = View::forge('admin/message/index', $data);

	}

	public function action_view($id = null)
	{
		$data['message'] = Model_Message::find($id);

		$this->template->title = "Message";
		$this->template->content = View::forge('admin/message/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Message::validate('create');

			if ($val->run())
			{
				$message = Model_Message::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'status' => Input::post('status'),
				));

				if ($message and $message->save())
				{
					Session::set_flash('success', e('Added message #'.$message->id.'.'));

					Response::redirect('admin/message');
				}

				else
				{
					Session::set_flash('error', e('Could not save message.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('admin/message/create');

	}

	public function action_edit($id = null)
	{
		$message = Model_Message::find($id);
		$val = Model_Message::validate('edit');

		if ($val->run())
		{
			$message->name = Input::post('name');
			$message->email = Input::post('email');
			$message->title = Input::post('title');
			$message->description = Input::post('description');
			$message->status = Input::post('status');

			if ($message->save())
			{
				Session::set_flash('success', e('Updated message #' . $id));

				Response::redirect('admin/message');
			}

			else
			{
				Session::set_flash('error', e('Could not update message #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$message->name = $val->validated('name');
				$message->email = $val->validated('email');
				$message->title = $val->validated('title');
				$message->description = $val->validated('description');
				$message->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('message', $message, false);
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('admin/message/edit');

	}

	public function action_delete($id = null)
	{
		if ($message = Model_Message::find($id))
		{
			$message->delete();

			Session::set_flash('success', e('Deleted message #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete message #'.$id));
		}

		Response::redirect('admin/message');

	}

}
