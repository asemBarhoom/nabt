<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Notification\NotificationCollection;
use App\Http\Resources\Notification\NotificationInfoResource;
use Exception;
use Illuminate\Notifications\DatabaseNotification;
use function request;

class NotificationController
{


    public function index(FilterRequest $request)
    {
//        $this->authorize('notifications_list');

        try {
            $notifications = $request
                ->user()
                ->notifications()
                ->paginate($request->per_page);

            $unread_notifications_count  = $request->user()->unreadNotifications()->count();

            return Response::respondSuccess(Response::SUCCESS, new NotificationCollection($notifications,$unread_notifications_count));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function seen(FilterRequest $request)
    {
        // $this->authorize('notifications_list'); // Uncomment if authorization is required

        try {
            $notifications = $request
                ->user()
                ->notifications()
                ->read()
                ->paginate($request->per_page);

            $unread_notifications_count = $request->user()->unreadNotifications()->count();

            return Response::respondSuccess(Response::SUCCESS, new NotificationCollection($notifications, $unread_notifications_count));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function notSeen(FilterRequest $request)
    {
        // $this->authorize('notifications_list'); // Uncomment if authorization is required

        try {
            $notifications = $request
                ->user()
                ->notifications()
                ->unread()
                ->paginate($request->per_page);

            $unread_notifications_count = $request->user()->unreadNotifications()->count();

            return Response::respondSuccess(Response::SUCCESS, new NotificationCollection($notifications, $unread_notifications_count));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show($id)
    {
//        $this->authorize('notifications_show');

        try {
            $Notification =
                request()->user()->notifications()->findOrFail($id);
            return Response::respondSuccess(Response::SUCCESS, new NotificationInfoResource($Notification));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function markAsRead()
    {
//        $this->authorize('notifications_markAsRead');

        try {
            $notificationId = request()->UUID;

            if (!Str::isUuid($notificationId)) {
                return Response::respondError("Invalid UUID format.");
            }

            $notification = DatabaseNotification::findOrFail($notificationId);
            $notification->markAsRead();
            return Response::respondSuccess(Response::SUCCESS, new NotificationInfoResource($notification));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function markAllAsRead(FilterRequest $request)
    {
//        $this->authorize('notifications_markAsRead');

        try {
            $Notifications =
                request()->user()->unreadNotifications()
                    ->get();
            foreach ($Notifications as $notification) {
                $notification->markAsRead();
            }

            $Notifications =
                request()->user()->notifications()
                    ->paginate($request->per_page);
            return Response::respondSuccess(Response::SUCCESS, new NotificationCollection($Notifications));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
