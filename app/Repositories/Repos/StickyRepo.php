<?php
namespace App\Repositories\Repos;

use App\Http\Resources\StickyResource;
use App\Models\StickyNote;
use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\StickyInterfaces;
use Auth;
use Exception;
use GrahamCampbell\ResultType\Success;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Carbon\Carbon;
use App\Helpers\ExternalUserHelper;



class StickyRepo implements StickyInterfaces
{
    protected $sticky, $notification;
    public function __construct(StickyNote $sticky, Notification $notification)
    {
        $this->sticky = $sticky;
        $this->notification = $notification;
    }
    /*
     * This function gives all sticky notes of user
     */
    public function index()
    {
        try {

            if (session()->has('external_user')) {

                $externalUserData = session('external_user');
                $userId = $externalUserData['user_id'];

                $stickiesQuery = $this->sticky::where('user_id', $userId);

                $user = null;

            } else {

                $userId = auth()->id();
                $stickiesQuery = $this->sticky::where('user_id', $userId);

                $user = auth()->user();
            }

            if (request()->filled('search')) {
                $search = request('search');

                $stickiesQuery->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            }

            $stickies = $stickiesQuery
                ->latest()
                ->paginate(6)
                ->withQueryString();

            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            $missedNotifications = collect();
            $showNotificationModal = false;

            if ($user) {
                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->where('scheduled_at', '>', $user->last_login_at)
                    ->where('scheduled_at', '<', $user->logedin_at)
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.dashboard', compact(
                'stickies',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    /*
     * This function will show single record
     */
    public function show()
    {
        try {
            if (session()->has('external_user')) {

                $externalUserData = session('external_user');
                $userId = $externalUserData['user_id'];

                $stickiesQuery = $this->sticky::where('user_id', $userId);

                $user = null;

            } else {

                $userId = auth()->id();
                $stickiesQuery = $this->sticky::where('user_id', $userId);

                $user = auth()->user();
            }





            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            $missedNotifications = collect();
            $showNotificationModal = false;

            if ($user) {
                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->where('scheduled_at', '>', $user->last_login_at)
                    ->where('scheduled_at', '<', $user->logedin_at)
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.create', compact(
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));
            return view('sticky.create');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
     * This function will store new sticky note
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (session()->has('external_user')) {

                $userId = session('external_user.user_id');

            } else {

                $user = auth()->user();

                $companyName = preg_replace('/\s+/', '', $user->company_name);

                $userId = $companyName . '_' . $user->id;
            }

            $sticky = new $this->sticky();
            $sticky->title = $data['title'];
            $sticky->content = $data['content'];
            $sticky->priority = $data['priority'];
            $sticky->color = $data['color'];
            $sticky->reminder_at = !empty($data['reminder']) ? $data['reminder'] : null;
            $sticky->user_id = $userId;
            $sticky->save();

            DB::commit();

            return redirect()->route('index')
                ->with('success', 'Sticky note created successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
     * This function will delete the record
     */
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();

            $sticky = $this->sticky
                ::where('id', $id)
                ->where('user_id', $userId)
                ->firstOrFail();

            $sticky->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Sticky note deleted successfully.'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'errorrrrr',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit($id)
    {
        if (session()->has('external_user')) {

            $externalUserData = session('external_user');
            $userId = $externalUserData['user_id'];

            $stickiesQuery = $this->sticky::where('user_id', $userId);

            $user = null;

        } else {

            $userId = auth()->id();
            $stickiesQuery = $this->sticky::where('user_id', $userId);

            $user = auth()->user();
        }
        $sticky = $this->sticky
            ::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $missedNotifications = collect();
        $showNotificationModal = false;
        if ($user) {
            $missedNotifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->where('scheduled_at', '>', $user->last_login_at)
                ->where('scheduled_at', '<', $user->logedin_at)
                ->get();

            $showNotificationModal = $missedNotifications->count() > 0;
        }

        $notifications = $this->notification::where('user_id', $userId)
            ->whereNull('read_at')
            ->orderBy('scheduled_at', 'desc')
            ->get();
        return view('sticky.edit', compact('sticky', 'missedNotifications', 'showNotificationModal', 'notifications'));
    }

    /*
     * this function will update the sticky record
     */
    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();
            $sticky = $this->sticky
                ::where('id', $id)
                ->where('user_id', $userId)
                ->firstOrFail();
            $sticky->title = $data['title'];
            $sticky->content = $data['content'];
            $sticky->priority = $data['priority'];
            $sticky->reminder_at = !empty($data['reminder']) ? $data['reminder'] : null;
            $sticky->save();
            DB::commit();
            return redirect()->route('index')->with('success', 'Sticky note updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'errorrrrr',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
     * This function gives high priority sticky notes of user
     */
    public function highPrior()
    {
        try {

            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();

            $stickies = $this->sticky::where('user_id', $userId)
                ->where('priority', 'high')
                ->latest()
                ->paginate(6);

            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            $missedNotifications = collect();
            $showNotificationModal = false;

            if (!session('external_user') && auth()->check()) {

                $user = auth()->user();

                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->whereBetween('scheduled_at', [
                        $user->last_login_at,
                        $user->logedin_at
                    ])
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.dashboard', compact(
                'stickies',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    /*
     * This function gives medium priority sticky notes of user
     */
    public function mediumPrior()
    {
        try {

            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();

            $stickies = $this->sticky::where('user_id', $userId)
                ->where('priority', 'medium')
                ->latest()
                ->paginate(6);

            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            $missedNotifications = collect();
            $showNotificationModal = false;

            if (!session('external_user') && auth()->check()) {

                $user = auth()->user();

                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->whereBetween('scheduled_at', [
                        $user->last_login_at,
                        $user->logedin_at
                    ])
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.dashboard', compact(
                'stickies',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
     * This function gives low priority sticky notes of user
     */
    public function lowPrior()
    {
        try {
            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();

            $stickies = $this->sticky::where('user_id', $userId)
                ->where('priority', 'low')
                ->latest()
                ->paginate(6);

            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            $missedNotifications = collect();
            $showNotificationModal = false;

            if (!session('external_user') && auth()->check()) {

                $user = auth()->user();

                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->whereBetween('scheduled_at', [
                        $user->last_login_at,
                        $user->logedin_at
                    ])
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.dashboard', compact(
                'stickies',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
     * This function gives notifications of user
     */

    public function notifications()
    {
        try {
            DB::beginTransaction();
            $unreadNotifications = $this->notification::with('sticky') // eager load stickies
                ->where('user_id', Auth::id())
                ->whereNull('read_at')        // Only not read
                ->orderBy('scheduled_at', 'desc')
                ->get();
            $count = $this->notification::where('user_id', Auth::id())->whereNull('read_at')->count();
            $user = auth()->user();
            $missedNotifications = collect();


            $missedNotifications = $this->notification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->where('scheduled_at', '>', $user->last_login_at)
                ->where('scheduled_at', '<', $user->logedin_at)
                ->get();

            $showNotificationModal = $missedNotifications->count() > 0;
            return view('sticky.notifications', compact(
                'missedNotifications',
                'showNotificationModal',
                'unreadNotifications',
                'count',
            ));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function markAsRead($id)
    {
        try {

            $userId = session('external_user')
                ? session('external_user')['user_id']
                : auth()->id();
            if (!$userId) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not logged in'
                ], 401);
            }
            $notification = Notification::where('id', $id)
                ->where('user_id', $userId)
                ->first();
            if (!$notification) {
                return response()->json([
                    'success' => false,
                    'message' => 'Notification not found'
                ], 404);
            }
            $notification->update([
                'read_at' => now()
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Marked as read'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error'
            ], 500);
        }
    }

    public function calenderView()
    {
        try {
            DB::beginTransaction();

            // 🔹 Determine hybrid user_id
            if (session()->has('external_user')) {
                $externalUserData = session('external_user');
                $userId = $externalUserData['user_id']; // CompanyName_12 format
                $user = null; // external users don't have last_login_at
            } else {
                $user = auth()->user();
                $userId = $user->id; // internal user numeric id
            }

            // 🔹 Fetch stickies with reminders for this user
            $stickies = $this->sticky::where('user_id', $userId)
                ->whereNotNull('reminder_at')
                ->orderBy('reminder_at', 'asc')
                ->get();

            // 🔹 Fetch notifications
            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            // 🔹 Missed notifications only for internal users
            $missedNotifications = collect();
            $showNotificationModal = false;
            if ($user) {
                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->where('scheduled_at', '>', $user->last_login_at)
                    ->where('scheduled_at', '<', $user->logedin_at)
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.calender', compact(
                'stickies',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function viewSticker($id)
    {
        try {

            // 🔹 Get Hybrid User ID
            if (session()->has('external_user')) {

                $userId = session('external_user.user_id');
                $user = null; // important for missed logic

            } else {

                $user = auth()->user();
                $userId = $user->id;
            }

            // 🔹 Get Sticky
            $sticky = $this->sticky::findOrFail($id);

            // 🔹 Unread Notifications (Both Users)
            $notifications = $this->notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->orderBy('scheduled_at', 'desc')
                ->get();

            // 🔹 Missed Notifications (ONLY Auth User)
            $missedNotifications = collect();
            $showNotificationModal = false;

            if ($user && $user->last_login_at && $user->logedin_at) {

                $missedNotifications = $this->notification::where('user_id', $userId)
                    ->whereNull('read_at')
                    ->whereBetween('scheduled_at', [
                        $user->last_login_at,
                        $user->logedin_at
                    ])
                    ->get();

                $showNotificationModal = $missedNotifications->count() > 0;
            }

            return view('sticky.viewSticky', compact(
                'sticky',
                'notifications',
                'missedNotifications',
                'showNotificationModal'
            ));

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    /*
     * This function checks for triggered notifications
     */
    public function check()
    {
        try {
            $user = auth()->user();

            $alerts = Notification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->where('is_triggered', true)
                ->get();

            return response()->json($alerts);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
